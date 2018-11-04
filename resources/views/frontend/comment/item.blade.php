
<div class="bg-white">


    <div class="row p-4">
        <div> {{ $comment->sender }} </div> :
        <div > {{ $comment->body }} </div>
    </div>


    @if($comment->replies && count($comment->replies) > 0)

        <div class="row pr-5">
            <div>پاسخ :</div>
            <div>توسط ادمین :</div>
        </div>

    @foreach($comment->replies as $reply)
            @include('frontend.comment.answer',$reply)
        @endforeach

    @endif

</div>
