@extends('layouts.admin')
@section('content')

    <div>{{  $comment->sender  }}</div>

    <td>{{  $comment->body  }}</td>

    پاسخ

    <form method="post" action="{{ route('admin.comments.answer',['id' => $comment->id]) }}">
        {!! csrf_field() !!}
        <textarea name="body"></textarea>
        <button type="submit">ارسال</button>

    </form>

@endsection