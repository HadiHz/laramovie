@extends('layouts.admin')
@section('content')



    پاسخ

    <form method="post" action="{{ route('admin.comments.update',['id' => $comment->id]) }}">
        {!! csrf_field() !!}
        <textarea name="body"></textarea>
        <button type="submit">ارسال</button>

    </form>

@endsection