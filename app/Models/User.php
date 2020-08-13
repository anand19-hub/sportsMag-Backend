<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'schedule';
    public $timestamps = false;

    protected $fillable = [
        'username',
        'password',
        'ROLE'
    ];
}
