<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubsUser extends Model
{
    public $timestamps = false;
    
    public function subsOrder()
    {
    
        return $this->hasMany(SubsOrder::class);
    }

    protected $fillable = ['userName', 'userAccount','userPassword','userJoinDatetime'];
}
