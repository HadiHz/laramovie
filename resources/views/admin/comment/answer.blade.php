@extends('layouts.admin')
@section('content')

    <div>{{  $comment->sender  }}</div>

    <td>{{  $comment->body  }}</td>

    پاسخ

    @if($comment->commentable_type === 'App\Models\Movie' )
        {{ $flag = 1 }}

     @else
        {{ $flag = 2 }}
    @endif
    <form method="post" action="{{ route('admin.comments.answer',['id' => $comment->id ,'flag' => $flag]) }}">
        {!! csrf_field() !!}
        <textarea name="body"></textarea>
        <button type="submit">ارسال</button>
    </form>

@endsection