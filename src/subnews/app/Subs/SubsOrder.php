<?php

namespace App\Subs;

use Illuminate\Database\Eloquent\Model;

class SubsOrder extends Model
{
    public $timestamps = false;
    protected $hidden = ['userPassword'];
    
    public function subsChannel()
    {
      return $this->hasOne(SubsChannel::class, 'id', 'channelId');
    }
    
    public function subsUser()
    {
      
      return $this->hasOne(SubsUser::class, 'id', 'userId');
    }

    protected $fillable = ['orderDatetime', 'orderEnable','channelId','userId'];
    
   
}

