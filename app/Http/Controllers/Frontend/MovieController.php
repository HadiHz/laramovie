<?php

namespace App\Http\Controllers\frontend;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{

    public function index(Request $request)
    {
        $movies = Movie::orderBy('updated_at', 'DESC')->paginate(15);
        return view('frontend.movie.index' , compact('movies'));
    }



    public function single($slug)
    {
        $movieItem = Movie::findBySlug($slug);
        $numberOfGenres = count($movieItem->genres);
        $numberOfCountries = count($movieItem->countries);
        $numberOfDirectors = count($movieItem->directors);
        $numberOfActors = count($movieItem->actors);
        $numberOfWriters = count($movieItem->writers);

        return view('frontend.movie.single' , compact('movieItem' , 'numberOfGenres',
            'numberOfDirectors' , 'numberOfActors', 'numberOfWriters' , 'numberOfCountries'));
    }
}
