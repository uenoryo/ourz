<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamUser extends Model
{
    protected $table = 'teams_users';
    protected $fillable = [
        'team_id', 'user_id',
    ];
}