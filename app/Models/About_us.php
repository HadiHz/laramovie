<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class About_us extends Model
{
    protected $table = 'about_uses';

    protected $guarded = ['id'];

    public function phone_numbers()
    {
        return $this->hasMany(Phone_number::class , 'about_us_id');
    }

    public function social_media_links()
    {
        return $this->hasMany(Social_media_link::class , 'about_us_id');
    }
}
