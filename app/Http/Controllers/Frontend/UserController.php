<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/3/2018
 * Time: 12:06 AM
 */

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;

class UserController extends Controller
{

    public function login(){
        //in view ro bezar samte front

        /*
        User::create([
            'id' => 1,
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' =>bcrypt('123')
        ]);*/


        return view('admin.login.index');
    }


    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required | email',
            'password' => 'required | min:3'
        ]);

        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            //agar passwordi ke midi bcrypt nabashe amaliate ehraze hoviat ro barat anjam nemide. bayad hata bara tet ham password ro bcrypt koni
            // Authentication passed...
            return redirect()->intended('welcome');
            //میبره جایی که کاربر یه پیج رو باز کرده بود و ما پاسش داده بودیم به ص لاگین...یه پیشفرض هم داره که اگه تو خود لاگین اومده بود یه سر کجا بره
        }

        return back();
    }


}