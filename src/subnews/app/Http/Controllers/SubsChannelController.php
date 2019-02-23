<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubsChannel;

class SubsChannelController extends Controller
{
    public function index()
    {
        return SubsChannel::all();
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
    
}
