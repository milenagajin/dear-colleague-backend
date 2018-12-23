<?php
namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{   
    protected $fillable = [
        'name', 'email', 'password', 'admin', 'votes', 
    ];
    
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function campaigns()
    {
        return $this->belongsToMany('App\Campaign')
          ->withTimestamps();
    }

    public function notesToUser()
    {
        return $this->hasMany('App\Note', 'to_user');
    }

    public function notesFromUser()
    {
        return $this->hasMany('App\Note', 'from_user');
    }
}
