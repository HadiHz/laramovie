<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Genre;
use App\Models\Movie;
use App\Models\Serial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    public function index()
    {
//        $m =new Movie();
//        $m = $m->findBySlug('film1-2018');
////        dd(str_slug($m->name));
//        dd($m->name);
    }

    public function search(Request $request)
    {
        $search = $request->input('search');
        $movies = Movie::where('name','LIKE','%'.$search."%")->get();
        $serials = Serial::where('name','LIKE','%'.$search."%")->get();
        $genres = Genre::where('name','LIKE','%'.$search."%")->get();

        foreach ($genres as $genre){
            foreach ($genre->movies as $movie){
                if (!stristr($movie->name , $search) ){
                    $movies->push($movie);


                }
            }
        }


        $allResults = $movies->concat($serials)->paginate(15);


        $allResults->withPath('search?search='.$search);


        return view('frontend.home.index', compact('allResults'));
    }

}
