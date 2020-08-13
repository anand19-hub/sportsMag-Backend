<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{

    protected $table = 'teams';
    public $timestamps = false;

    protected $fillable = [
        'event_id',
        'teamName',
        'captianName',
        'viceCaptianName',
        'teamContactNumber',
        'otherPlayers'
    ];
}
