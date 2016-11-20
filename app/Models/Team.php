<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'name', 'display',
    ];

    public function users()
    {
        return $this->belongsToMany('App\User', 'teams_users')->withTimestamps();
    }
}
