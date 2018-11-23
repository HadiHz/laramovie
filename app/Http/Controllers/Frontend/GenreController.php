<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function index(Request $request ,$slug)
    {
        $genre = Genre::findBySlug($slug);
        $movies = $genre->movies()->get();
        $serials = $genre->serials()->get();
        $allResults = $movies->concat($serials)->paginate(15);
        return view('frontend.home.index' , compact('allResults', 'genre'));
    }
}
