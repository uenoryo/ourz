<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    protected $table = 'teams_users';
    protected $fillable = [
        'team_id', 'user_id',
    ];

    public function member()
    {
        return $this->hasOne('App\Models\Member', 'teams_users_id');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id');
    }
}
