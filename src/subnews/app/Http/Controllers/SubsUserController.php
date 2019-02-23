<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubsUser;

class SubsUserController extends Controller
{
    public function index()
    {
        return SubsUser::all();
    }
    
    public function store(Request $request)
    {
        $user = SubsUser::create($request->all());

        return response()->json($user, 201); 
    }
    
    public function update(Request $request, $account)
    {
        $user = SubsUser::where('userAccount', '=', $account)->firstOrFail();
        //$order->update($request->all());
        $user ->update(['userJoinDatetime' => $request->input('userJoinDatetime')]);
        return $user;
    }
    
    public function delete(Request $request, $account)
    {
        //$user = SubsUser::findOrFail($account);
        //$user->delete();
        SubsUser::where('userAccount',$account)->delete();
        
        return response()->json(null, 204); 
    }
}
