<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubsChannel extends Model
{
    public $timestamps = false;
    
    public function subsOrder()
    {
        return $this->hasMany(SubsOrder::class,'channelId');
    }
    public static function isExist($channelName)
    {
        $channel =  SubsChannel::where('channelName', $channelName)->get();
        
        return (count($channel)>0) ? true : false;
    }
    public static function getId($channelName)
    {
       return SubsChannel::where('channelName', $channelName)->value('id');
    }
    protected $fillable = ['channelName'];
}
