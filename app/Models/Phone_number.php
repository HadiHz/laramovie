<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone_number extends Model
{
    protected $table = 'phone_numbers';

    protected $guarded = ['id'];

    public function about_us()
    {
        return $this->belongsTo(About_us::class , 'about_us_id');
    }
}
