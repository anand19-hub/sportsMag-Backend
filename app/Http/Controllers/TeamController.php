<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teams;


class TeamController extends Controller
{

    public function createMatchteams(Request $req)
    {
        $teams = new Teams();
        $teams->event_id = $req->input('event_id');
        $teams->teamName = $req->input('teamName');
        $teams->captianName = $req->input('captianName');
        $teams->viceCaptianName = $req->input('viceCaptianName');
        $teams->teamContactNumber = $req->input('teamContactNumber');
        $teams->otherPlayers = $req->input('otherPlayers');

        $res = $teams->save();
        if ($res > 0) {
            $msg = "Match teams Added Sucessfully";
            $status = 201;
        } else {
            $msg = "Match teams Added Failed";
            $status = 404;
        }

        return response()->json($msg, $status);
    }


    public function editTeam(Request $req, $id)
    {

        $event_id = $req->input('event_id');
        $teamName = $req->input('teamName');
        $captianName = $req->input('captianName');
        $viceCaptianName = $req->input('viceCaptianName');
        $teamContactNumber = $req->input('teamContactNumber');
        $otherPlayers = $req->input('otherPlayers');

        $res = Teams::where('id', $id)->update(array(
            'event_id'=>$event_id,
            'teamName' => $teamName,
            'captianName' => $captianName,
            'viceCaptianName' => $viceCaptianName,
            'teamContactNumber' => $teamContactNumber,
            'otherPlayers' => $otherPlayers
        ));

        if ($res > 0) {
            $msg = "Team Edited Sucessfully";
            $status = 200;
        } else {
            $msg = " Team Edit failed";
            $status = 404;
        }
        return response()->json($msg, $status);
    }

    public function getAllTeamsDetails()
    {
        return response()->json(Teams::get(), 200);
    }
}
