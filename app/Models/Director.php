<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{

    protected $guarded = ['id'];

    public function movies()
    {
        return $this->morphedByMany(Movie::class , 'producible' ,'director_products', 'director_id' ,'producible_id');
    }
    public function serials()
    {
        return $this->morphedByMany(Serial::class , 'producible' ,'director_products', 'director_id' ,'producible_id');
    }
}
