<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [
        'name', 'company_name'
    ];

    public function users()
    {
        return $this->belongsToMany('App\User')
          ->withTimestamps();
    }

    public function campaigns()
    {
        return $this->belongsToMany('App\Note')
          ->withTimestamps();
    }
}
