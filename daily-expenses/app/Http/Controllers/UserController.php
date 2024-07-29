<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function createUser(Request $request)
    {
        DB::table('app_users')->insert(
        array(
            'name'   =>$request->name,
            'username'   =>$request->username,
            'email'   =>$request->email,
            'phone'   =>$request->phone,
           )
       );
        return response()->json([
            "user successfuly created"
        ]);
    }

    public function userDetails($uname)
    {
        $name=DB::table('app_users')
        ->where('username',$uname)
        ->pluck('name')
        ->first();
        $phone=DB::table('app_users')
        ->where('username',$uname)
        ->pluck('phone')
        ->first();
        $email=DB::table('app_users')
        ->where('username',$uname)
        ->pluck('email')
        ->first();
        return response()->json([
            'name'=>$name,
            'username'=>$uname,
            'phone' => $phone,
            'email' => $email,
        ]);
    }

}
