<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'text', 'to_user', 'from_user'
    ];

    public function toUser(){
        $this->belongsTo('App\User', 'to_user');
    }

    public function fromUser(){
        $this->belongsTo('App\User', 'from_user');
    }

    public function campaign(){
        return $this->belongsTo('App\Campaign');
    }
}
