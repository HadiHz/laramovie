<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $guarded = ['id'];

    public function movies()
    {
        return $this->morphedByMany(Movie::class , 'producible' ,'writer_products', 'actor_id' ,'producible_id');
    }
    public function serials()
    {
        return $this->morphedByMany(Serial::class , 'producible' ,'writer_products', 'actor_id' ,'producible_id');
    }
}
