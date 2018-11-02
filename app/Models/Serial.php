<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
    protected $guarded = ['id'];

    public function actors()
    {
        return $this->morphToMany(Actor::class , 'producible','actor_products','producible_id' , 'actor_id');
    }

    public function directors()
    {
        return $this->morphToMany(Director::class , 'producible','director_products','producible_id' , 'director_id');
    }

    public function countries()
    {
        return $this->morphToMany(Country::class ,'producible','country_products','producible_id' , 'country_id');
    }

    public function genres()
    {
        return $this->morphToMany(Genre::class ,'producible','genre_products','producible_id' , 'genre_id');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable')->whereNull('parent_id');
    }


    public function seasons()
    {
        return $this->hasMany(Season::class , 'serial_id');
    }

}
