<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Serial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SerialController extends Controller
{
    public function index(Request $request)
    {
        $serials = Serial::orderBy('updated_at', 'DESC')->paginate(15);
        return view('frontend.serial.index' , compact('serials'));
    }



    public function single($slug)
    {
        $serialItem = Serial::findBySlug($slug);
        $numberOfGenres = count($serialItem->genres);
        $numberOfCountries = count($serialItem->countries);
        $numberOfDirectors = count($serialItem->directors);
        $numberOfActors = count($serialItem->actors);
        $numberOfWriters = count($serialItem->writers);

        return view('frontend.serial.single' , compact('serialItem' , 'numberOfGenres',
            'numberOfDirectors' , 'numberOfActors', 'numberOfWriters' , 'numberOfCountries'));
    }
}
