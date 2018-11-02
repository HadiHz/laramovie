<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = ['id'];

    public function movies()
    {
        return $this->morphedByMany(Movie::class , 'producible' ,'country_products', 'country_id' ,'producible_id');
    }
    public function serials()
    {
        return $this->morphedByMany(Serial::class , 'producible' ,'country_products', 'country_id' ,'producible_id');
    }
}
