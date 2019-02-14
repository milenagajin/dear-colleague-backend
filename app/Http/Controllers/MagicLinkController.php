<?php   

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Auth\MagicAuthentication;
use Response;
use JWTAuth;

class MagicLinkController extends Controller
{
    public function sendToken(Request $request, MagicAuthentication $auth){
        $this->validateLogin($request);
        $auth->requestLink();
     }
 
     protected function validateLogin(Request $request){
         $this->validate($request, [
             "email" => 'required|email|max:255|exists:users'
         ]);
     }

     public function validateToken(Request $request){
        
        try {
             
             if (! $user = JWTAuth::parseToken()->authenticate()) {
                 return response()->json(['user_not_found'], 404);
            }
    
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
    
            return response()->json(['token_expired'], $e->getStatusCode());
    
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
    
            return response()->json(['token_invalid'], $e->getStatusCode());
    
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
    
            return response()->json(['token_absent'], $e->getStatusCode());
    
        }
      
        return response()->json(compact('user'));
    }
}
