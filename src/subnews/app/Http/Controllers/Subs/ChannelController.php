<?php

namespace App\Http\Controllers\Subs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subs\SubsChannel;
use App\Subs\SubsOrder;

class ChannelController extends Controller
{
    public function index()
    {
        return SubsChannel::all();
    }
    
    public function show($channelId)
    {
        
        $order = SubsOrder::join('subs_users', 'subs_users.id', '=', 'subs_orders.userId')
        ->join('subs_channels', 'subs_channels.id', '=', 'subs_orders.channelId')
        ->where('subs_channels.id',  $channelId)
        ->get();

        return $order;
    }
    
    public function store(Request $request)
    {
        $channel = SubsChannel::where('channelName', $request->input('channelName'))->get();
        if(count($channel) < 1)
        {
            $channel = SubsChannel::create($request->all());
            return response()->json($channel, 201);
        }
        else
        {
            return response()->json($channel,202);
        }
    }
    
    public function delete(Request $request, $channelName)
    {
        //$user = SubsUser::findOrFail($account);
        //$user->delete();
        SubsChannel::where('channelName',$channelName)->delete();
        
        return response()->json(null, 204); 
    }
    
}
