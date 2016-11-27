<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    const PRIORITY_WAIT = 1;
    const PRIORITY_ROOT = 4;

    //入室許可レベル
    const ALLOW_LEVEL = self::PRIORITY_ROOT;

    protected $fillable = [
        'teams_users_id', 'priority',
    ];

    public function isAuthenticated()
    {
        return $this->priority >= self::ALLOW_LEVEL;
    }

    public function isWaiting()
    {
        return $this->priority == self::PRIORITY_WAIT;
    }
}
