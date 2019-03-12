<?php

namespace App\Subs;

use Illuminate\Database\Eloquent\Model;

class SubsUser extends Model
{
    public $timestamps = false;
    protected $hidden = ['userPassword','userAccount'];
    
    public function subsOrders()
    {
    
        return $this->hasMany(SubsOrder::class,'userId');
    }

    protected $fillable = ['userName', 'userAccount','userPassword','userJoinDatetime'];
    
    public static function isExist($userAccount)
    {
        $user =  SubsUser::where('userAccount', $userAccount)->get();
        
        return (count($user)>0) ? true : false;

    }
    
    public static function getId($userAccount)
    {
       return SubsUser::where('userAccount', $userAccount)->value('id');
    }
}
