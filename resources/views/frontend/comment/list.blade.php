@if($item->comments && count($item->comments) > 0)

    @foreach($item->comments->where('status', 2) as $comment)

        @include('frontend.comment.item',$comment)

    @endforeach

@else
    @include('frontend.comment.no-item')
@endif



