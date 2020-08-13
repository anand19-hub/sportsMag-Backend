<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function postMatch(Request $req)
    {
        $event = new Event();
        $event->org_id = $req->input('org_id');
        $event->eventName = $req->input('eventName');
        $event->eventDate = $req->input('eventDate');
        $event->eventLocation = $req->input('eventLocation');
        $event->eventfees = $req->input('eventfees');
        $event->eventDescription = $req->input('eventDescription');
        $event->status = 1;



        $res = $event->save();
        if ($res > 0) {
            $msg = "event Added Sucessfully";
            $status = 201;
        } else {
            $msg = "event Added Failed";
            $status = 404;
        }

        return response()->json($msg, $status);
    }

    public function getAllEvents()
    {
        return response()->json(event::get(),200);

    }


    public function editPostMatch(Request $req,$id)
    {

        $org_id = $req->input('org_id');
        $eventName = $req->input('eventName');
        $eventDate = $req->input('eventDate');
        $eventLocation = $req->input('eventLocation');
        $eventfees = $req->input('eventfees');
        $eventDescription = $req->input('eventDescription');

        $res = Event::where('id',$id)->update(array(
            'org_id'=> $org_id,
            'eventName'=> $eventName,
            'eventDate'=> $eventDate,
            'eventLocation' => $eventLocation,
            'eventfees' => $eventfees,
            'eventDescription' => $eventDescription
        ));

        if($res>0)
        {
            $msg = "Matches Edited Sucessfully";
            $status = 200;
        }else{
            $msg = "Edit failed";
            $status = 404;
        }
        return response()->json($msg,$status);
    }

    public function deleteEvent($id)
    {
        $records = DB::delete("delete from 	eventtable where id ='$id'");
        if ($records > 0) {
            $message = "Property deleted successfully";
            $status = 200;
        } else {
            $message = "Property deleted unsuccessfully";
            $status = 404;
        }

        return response()->json($message, $status);
    }

public function getEventsByOrg_id($org_id)
{
  return response()->json(Event::where('org_id', $org_id)->get(),200);
}

public function searchEvent(Request $req)
{
    $eventName = $req->input('eventName');
    return response() -> json(Event::where("eventName","like","%$eventName%")->get(),200);

}







}
