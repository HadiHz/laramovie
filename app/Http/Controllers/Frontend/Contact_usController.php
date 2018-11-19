<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2018
 * Time: 12:26 AM
 */

namespace App\Http\Controllers\Frontend;


use App\Models\Contact_us;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Contact_usController extends Controller
{
    public function index(){
        return view('frontend.contact_us.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'body' => 'required',

        ]);

        $contact_us = new Contact_us();
        $contact_us->name = $request->get('name');
        $contact_us->email = $request->get('email');
        $contact_us->body = $request->get('body');
        $contact_us->save();
        //bayad ye payam befrestim ke payamet baraye baresi reft samte admin :)
        return back();

    }

}