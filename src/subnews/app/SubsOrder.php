<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubsOrder extends Model
{
    public function subsChannel()
    {
      return $this->belongsTo(SubsChannel::class);
    }
    
    public function subsUser()
    {
      return $this->belongsTo(SubsUser::class);
    }

    protected $fillable = ['orderDateTime', 'orderEnable','channelId','userId'];
    
   
}

