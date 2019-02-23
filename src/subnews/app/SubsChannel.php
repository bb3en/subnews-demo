<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubsChannel extends Model
{
    public function subsOrder()
    {
    
        return $this->hasMany(SubsOrder::class);
    }
    
    
}
