<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/2/2018
 * Time: 10:28 PM
 */

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Movie;
use App\Models\Serial;

class CommentController extends Controller
{


    public function store(Request $request, $id,$flag)
    {
        $request->validate([
            'body' => 'required',
            'sender_email' => 'required|email'
        ]);

        $comment = new Comment;
        $comment->sender_name = $request->get('sender_name');
        $comment->sender_email = $request->get('sender_email');
        $comment->body = $request->get('body');

        if($flag == 1){//movie
            $movie = Movie::find($id);
            $movie->comments()->save($comment);
        }elseif ($flag == 2){//serial
            $serial = Serial::find($id);
            $serial->comments()->save($comment);
        }
        //bayad ye payam befrestim ke payamet baraye baresi reft samte admin :)
        return back();
    }



}