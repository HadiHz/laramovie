<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $guarded = ['id'];

    protected $dates = ['release_date'];

    public function serial()
    {
        return $this->belongsTo(Serial::class , 'serial_id');
    }

    public function episodes()
    {
        return $this->hasMany(Episode::class , 'season_id');
    }
}
