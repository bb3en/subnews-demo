<?php

namespace App\Http\Controllers\Subs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subs\SubsOrder;
use App\Subs\SubsUser;
use App\Subs\SubsChannel;
    
class OrderController extends Controller
{
    public function index()
    {
        return SubsOrder::all();
    }

    public function show($id)
    {
        return SubsOrder::find($id);
    }

    public function store(Request $request)
    {
        $userAccount = $request->input('userAccount');
        $channelName = $request->input('channelName');
        $isExistUser =SubsUser::isExist($userAccount);
        $isExistChannel = SubsChannel::isExist($channelName);
        
        $order = SubsOrder::join('subs_users', 'subs_users.id', '=', 'subs_orders.userId')
        ->join('subs_channels', 'subs_channels.id', '=', 'subs_orders.channelId')
        ->where('subs_users.userAccount', $userAccount)
        ->where('subs_channels.channelName',  $channelName)
        ->get();
        
        if($isExistUser && $isExistChannel) 
        {
            if(count($order)<1)
            {
                $channelId = SubsChannel::getId($channelName);
                $userId = SubsUser::getId($userAccount);
                $order = SubsOrder::create($request->all() + ['channelId' => $channelId,'userId'=> $userId]);
                return response()->json($order, 201);
            }
            else
            {
                return response()->json($order, 202);
            }
        }
        else
        {
            return response()->json($order, 202);
        }
    }

    public function update(Request $request, $userAccount)
    {
        $channelName = $request->input('channelName');
        $channelId = SubsChannel::getId($channelName);
        $userId = SubsUser::getId($userAccount);
        $isExistUser =SubsUser::isExist($userAccount);
        $isExistChannel = SubsChannel::isExist($channelName);
        
        if($isExistUser && $isExistChannel)
        {

            $order = SubsOrder::where('channelId', '=', $channelId)
            ->where('userId', '=', $userId)
            ->update(['orderEnable' => $request->input('orderEnable')]);
            
            return $order;
        }
        else
        {
            return response()->json(null, 202);
        }

    }

    public function delete(Request $request, $userAccount)
    {

        $channelName = $request->input('channelName');
        $isExistChannel = SubsChannel::isExist($channelName);
        $isExistUser = SubsUser::isExist($userAccount);
        
        if($isExistUser && $isExistChannel)
        {
            $channelId = SubsChannel::getId($channelName);
            $userId = SubsUser::getId($userAccount);
          
            SubsOrder::where('channelId', '=',$channelId)
            ->where('userId', '=',$userId)
            ->delete();
            return response()->json(null, 204);
        }
        else
        {
            return response()->json(null, 202);
        }

        $order->delete();

        
    }
}
