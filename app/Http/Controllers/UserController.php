<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Player;
use App\Orginization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
class UserController extends Controller
{
    public function registerPlayer(Request $req)
    {
        $player=new Player();
        $id=Str::uuid();
        $player->id=$id;
        $player->firstname=$req->input('firstname');
        $player->lastname=$req->input('lastname');
        $password=$req->input('password');
        $hash_password=Hash::make($password);
        $player->password=$hash_password;
        $player->email=$req->input('email');
        $user=new User();
        $user->username=$req->input('firstname');
        $user->password=$hash_password;
        $user->ROLE='Player';
        $user->user_id=$id;
        $res = $player->save();
        $resUser = $user->save();
        if($res==true && $resUser==true){
            $message= "Player created successfully";
            $status = 201;
         }else{
             $message= "Player created unsuccessfully";
             $status = 404;
         }
         return response()->json($message,$status);
    }
    public function registerOrg(Request $req)
    {
        $player=new Orginization();
        $id=Str::uuid();
        $player->id=$id;
        $player->org_name=$req->input('org_name');
        $password=$req->input('password');
        $hash_password=Hash::make($password);
        $player->password=$hash_password;
        $player->email=$req->input('email');
        $user=new User();
        $user->username=$req->input('org_name');
        $user->password=$hash_password;
        $user->ROLE='Org';
        $user->user_id=$id;
        $res = $player->save();
        $resUser = $user->save();
        if($res==true && $resUser==true){
            $message= "Organizer created successfully";
            $status = 201;
         }else{
             $message= "Organizer created unsuccessfully";
             $status = 404;
         }
         return response()->json($message,$status);
    }

    public function Login(Request $req)
    {
      $username = $req->input('username');
      $password = $req->input('password');
      $user1=User::where('username',$username);
      $pass=$user1->pluck('password');
      $role=$user1->pluck('ROLE');
      $uid=$user1->pluck('user_id');
      $check=Hash::check($password, $pass[0]);
      $arr = array(
          "role"=>$role[0],
          "uid"=>$uid[0]
      );
      if($check==true){
          return response()->json($arr,200);
      }else{
          return response()->json("wrong",404);
      }

    }
}
