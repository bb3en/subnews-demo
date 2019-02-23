<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubsChannelController extends Controller
{
     public function register(Request $request){
        //Validate fields
        $this->validate($request,[
            'userName' => 'required|max:255',
            'userAccount' => 'required|max:20',
            'userPassword' => 'required|min:8|confirmed',
        ]);
        //Create user, generate token and return
        $user =  SubsUser::create([
            'userName' => $request->input('userName'),
            'userAccount' => $request->input('userAccount'),
            'userPassword' => Hash::make($request->input('userPassword')),
        ]);
        $token = JWTAuth::fromUser($user);
        return response()->json(compact('token'));
    }
}
