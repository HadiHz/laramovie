<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use App\Models\Subtitle;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function index()
    {
//        $movie = Movie::find(1);
//        $sub = new Subtitle();
//        $sub->download_link = "link2";
//        $movie->subtitles()->save($sub);
//        $sub = Subtitle::find(1);
//        $pro = $sub->producible->name;
//        dd($movie->subtitles()->get());
//        dd($pro);
//        $name = str_slug($this->name);
    }

    public function create(Request $request)
    {

    }

    public function store(Request $request)
    {

    }

    public function edit(Request $request , $id)
    {

    }

    public function update(Request $request, $id)
    {

    }

    public function delete(Request $request, $id)
    {

    }
}
