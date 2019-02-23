<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubsOrder extends Model
{
    protected $fillable = ['orderDateTime', 'orderEnable','channelId','userId'];
}
