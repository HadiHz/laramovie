@if($movieItem->comments && count($movieItem->comments) > 0)

    @foreach($movieItem->comments->where('status', 2) as $comment)

        @include('frontend.comment.item',$comment)

    @endforeach

@else
    @include('frontend.comment.no-item')
@endif



