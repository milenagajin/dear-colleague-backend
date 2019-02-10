<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Campaign;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //geting users from campaign with parameter $id
   
    public function index($id)
    {   
        
        $campaignUsers = Campaign::with('users')->find($id)->users;
       
        foreach($campaignUsers as $user){
            $user->votes = User::find($user->id)->notesToUser->count();
        }
        return response()->json($campaignUsers);
    }   

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        info($request);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->admin = false;
            
        if($user->save()){
            $user->campaigns()->attach($request->input('campaignId'));
            return $user;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reqId = $request->input('id');
        if($reqId != $id){
            return response('Id from URL is not the same as one in edited User!', 400);
        }
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        if($user->save()){
            return $user;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user -> delete();
    }
}
