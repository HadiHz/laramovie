<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subtitle extends Model
{
    protected $guarded = ['id'];


    public function producible()
    {
        return $this->morphTo('producible' , 'producible_type' , 'producible_id');
    }

}
