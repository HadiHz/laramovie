<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 11/2/2018
 * Time: 9:53 PM
 */

namespace App\Http\Controllers\Admin;



class CommentController extends Controller
{

    public function index(){
        $comments = Comment::all()->sortKeysDesc();
        return view('admin.comment.list' , compact('comments'));
    }

    public function verify($id,$flag){
        $commentItem = Comment::find($id);
        $num = 1;

        if($flag == 1){//accept
            $num = 2;
        }else{//reject
            $num = 3;
        }
        $commentItem->update([
            'status' => $num
        ]);

        return back();

    }

    public function singleshow($id){
        $comment = Comment::find($id);
        return view('admin.comment.answer',compact('comment'));
    }

    public function answer(Request $request, $id,$flag){
        $comment = new Comment;
        $comment->body = $request->get('body');
        $comment->sender_name = 'admin';
        $comment->sender_email = 'admin@gmail.com';
        $comment->status = 4;//for admin answers
        $comment->parent_id = $id;


        $id2 = Comment::find($id)->commentable()->first()->id;//get post id related to this comment

        if($flag == 1){//movie
            $movie = Movie::find($id2);
            $movie->comments()->save($comment);
        }elseif ($flag == 2){//serial
            $serial = Serial::find($id2);
            $serial->comments()->save($comment);
        }

        return Redirect::route('admin.comments.list');
    }


    public function edit($id){
        $comment = Comment::find($id);
        return view('admin.comment.edit',compact('comment'));
    }

    public function update(Request $request,$id)
    {
        $comment = Comment::find($id);
        $comment->update([
            'body' => $request->get('body'),
        ]);

        if($comment){
            return Redirect::route('admin.comments.list');
        }

    }

    public function remove($id){
        $removeResult = Comment::destroy([$id]);

        if($removeResult){
            return Redirect::route('admin.comments.list');
        }
    }
}

