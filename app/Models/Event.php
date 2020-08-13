<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $table = 'eventTable';
    public $timestamps = false;

    protected $fillable = [
        'org_id',
        'eventName',
        'eventDate',
        'eventLocation',
        'eventfees',
        'eventDescription',
        'status'
    ];

}
