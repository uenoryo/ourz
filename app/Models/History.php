<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';
    public $timestamps = false;
    protected $fillable = [
        'document_id', 'member_id',
    ];
}
