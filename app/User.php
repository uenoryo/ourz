<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function teams()
    {
        return $this->belongsToMany('App\Models\Team', 'teams_users')->withTimestamps();
    }

    public function teamUser()
    {
        return $this->hasMany('App\Models\TeamUser');
    }

    public function member(int $team_id)
    {
        $team_user = $this->teamUser()->where('team_id', $team_id)->first();
        return isset($team_user) ? $team_user->member()->first() : null;
    }
}
