<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/19/2018
 * Time: 12:51 AM
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact_us;

class Contact_usController extends Controller
{
    public function index(){
        $contact_uses = Contact_us::all()->sortKeysDesc();
        return view('admin.contact_us.list',compact('contact_uses'));
    }

    public function seen($id){
        $contact_us = Contact_us::find($id);
        $contact_us->update([ //mire too ghesmate makhsoose email haye =====>>> Agreement
            'status' => 2
        ]);

        return back();
    }

    public function remove($id){
        $removeResult = Contact_us::destroy([$id]);

        if($removeResult){
            return back()->with('success','پیام مورد نظر حذف شد');
        }
    }

}