<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'team_id', 'title', 'body',
    ];
}
