<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/6/2018
 * Time: 9:55 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use App\Mail\SendMailable;
use App\Models\Film_request;
use http\Env\Request;
use Illuminate\Support\Facades\Mail;

class FilmRequestController extends Controller
{
    public function index(){
        $film_requests = Film_request::all()->sortKeysDesc();
        return view('admin.film_request.list',compact('film_requests'));
    }

    public function sendMail($id,$flag){
        $film_request = Film_request::find($id);
        $name = $film_request->name;

        Mail::to($film_request->email)->send(new SendMailable($name,$flag));


        if($flag == 1){
            $film_request->update([ //mire too ghesmate makhsoose email haye =====>>> Agreement
                'status' => 2
            ]);
        }elseif ($flag == 2){
            $film_request->update([ //mire too ghesmate makhsoose email haye =====>>> Available
                'status' => 3
            ]);
        }


        return back()->with('success','ایمیل مربوطه برای کاربر مورد نظر شما ارسال شد');
    }

    public function remove($id){
        $removeResult = Film_request::destroy([$id]);

        if($removeResult){
            return back()->with('success','درخواست مورد نظر حذف شد');
        }
    }


}