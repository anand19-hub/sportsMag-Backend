<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{

    protected $table = 'result';
    public $timestamps = false;

    protected $fillable = [
        'event_id',
        'teamName',
        'noOfWins',
        'noOfLost',
        'totalPoints'
    ];

}
