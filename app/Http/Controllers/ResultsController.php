<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Result;


class ResultsController extends Controller
{
    public function createMatchResults(Request $req)
    {
        $result = new Result();
        $result->event_id = $req->input('event_id');
        $result->teamName = $req->input('teamName');
        $result->noOfWins = $req->input('noOfWins');
        $result->noOfLost = $req->input('noOfLost');
        $result->totalPoints = $req->input('totalPoints');

        $res = $result->save();
        if ($res > 0) {
            $msg = "Results Added Sucessfully";
            $status = 201;
        } else {
            $msg = "Results Added Failed";
            $status = 404;
        }

        return response()->json($msg, $status);
    }

    public function getAllMatchResults()
    {
        return response() -> json(Result::get(),200);

    }
}
