<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schedule;


class ScheduleController extends Controller
{

    public function createMatchSchedule(Request $req)
    {
        $schedule = new Schedule();
        $schedule->event_id = $req->input('event_id');
        $schedule->first_team = $req->input('first_team');
        $schedule->second_team = $req->input('second_team');
        $schedule->eventDate = $req->input('eventDate');
        $schedule->eventtime = $req->input('eventtime');
        $schedule->eventLocation = $req->input('eventLocation');


        $res = $schedule->save();
        if ($res > 0) {
            $msg = "Match Schedule Added Sucessfully";
            $status = 201;
        } else {
            $msg = "Match Schedule Added Failed";
            $status = 404;
        }

        return response()->json($msg, $status);
    }

    public function getAllMatches()
    {
        return response() -> json(Schedule::get(),200);

    }

    public function checkMatchDetails($event_id)
    {
      return response()->json(Schedule::where('event_id', $event_id)->get(),200);
    }

}
