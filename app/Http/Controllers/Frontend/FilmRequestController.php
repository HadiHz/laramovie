<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/6/2018
 * Time: 9:42 PM
 */

namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Controller;
use App\Models\Film_request;
use Illuminate\Http\Request;

class FilmRequestController extends Controller
{


    public function index(){
        return view('frontend.film_request.form');
    }

    public function store(Request $request){
        $request->validate([
            'email' => 'required | email',
            'subject' => 'required',
            'body' => 'required',

        ]);

        $film_request = new Film_request();
        $film_request->name = $request->get('name');
        $film_request->email = $request->get('email');
        $film_request->subject = $request->get('subject');
        $film_request->body = $request->get('body');
        $film_request->save();
        //bayad ye payam befrestim ke payamet baraye baresi reft samte admin :)
        return back();
    }


}