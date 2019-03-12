<?php

namespace App\Http\Controllers\Subs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subs\SubsUser;

class UserController extends Controller
{
    public function index()
    {
        return SubsUser::all();
    }
    
    public function show($userAccount)
    {
        $user = SubsUser::where('userAccount', '=', $userAccount)->firstOrFail();
        //$user = SubsUser::find(1);
        return $user->subsOrders;
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
