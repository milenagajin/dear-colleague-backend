<?php

namespace App\Auth;

use App\User;
use Illuminate\Http\Request;
use JWTFactory;
use JWTAuth;
use App\Mail\RegisterInvatation;
use Mail;

class MagicAuthentication {

  protected $request;

  protected $identifier = 'email';

  protected $user;

  public function __construct(Request $request)
  {
    $this->request = $request;
  }

  public function requestLink()
  {
    $user = $this->getUserByIdentifier($this->request->get($this->identifier));
    $this->user = $user;

    $this->sendMagicLink();
  }

  protected function getUserByIdentifier($value){
    return User::where($this->identifier, $value)->firstOrFail();
  }

  protected function sendMagicLink(){

    $token = JWTAuth::fromUser($this->user);
    
    Mail::to($this->user)->send(new RegisterInvatation($this->user, $token, $this->request->input('campaignId')));
      
    if (Mail::failures()) {
        info("failure");
      }
  }

}