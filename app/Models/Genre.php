<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use sluggable;
    use SluggableScopeHelpers;


    protected $guarded = ['id'];

    public $timestamps = false;

    public function movies()
    {
        return $this->morphedByMany(Movie::class , 'producible' ,'genre_products', 'genre_id' ,'producible_id');
    }
    public function serials()
    {
        return $this->morphedByMany(Serial::class , 'producible' ,'genre_products', 'genre_id' ,'producible_id');
    }



    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


}
