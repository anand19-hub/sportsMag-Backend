<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $table = 'schedule';
    public $timestamps = false;

    protected $fillable = [
        'event_id',
        'first_team',
        'second_team',
        'eventDate',
        'eventtime',
        'eventLocation'
    ];
}
