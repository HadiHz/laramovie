<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social_media_link extends Model
{
    protected $table = 'social_media_links';

    protected $guarded = ['id'];

    public function about_us()
    {
        return $this->belongsTo(About_us::class , 'about_us_id');
    }
}
