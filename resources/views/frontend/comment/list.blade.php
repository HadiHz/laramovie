@if($article_item->comments && count($article_item->comments) > 0)

    @foreach($article_item->comments->where('status', 2) as $comment)

        @include('frontend.comment.item',$comment)

    @endforeach

@else
    @include('frontend.comment.no-item')
@endif



