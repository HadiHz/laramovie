<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download_link extends Model
{
    protected $guarded = ['id'];


    public function producible()
    {
        return $this->morphTo('producible' , 'producible_type' , 'producible_id');
    }
}
