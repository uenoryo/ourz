<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    const PRIORITY_WAIT = 1;
    const PRIORITY_ROOT = 4;

    protected $fillable = [
        'teams_users_id', 'priority',
    ];
}
