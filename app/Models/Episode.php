<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    protected $guarded = ['id'];

    public function subtitles()
    {
        return $this->morphMany(Subtitle::class, 'producible' , 'producible_type' , 'producible_type');
    }

    public function download_links()
    {
        return $this->morphMany(Download_link::class, 'downloadable' , 'downloadable_type' , 'downloadable_id');
    }

    public function season()
    {
        return $this->belongsTo(Season::class , 'season_id');
    }
}
