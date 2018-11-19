@if($item->comments && count($item->comments) > 0)
    <div class="row mt-3">
        <div class="col-12 col-md-2"></div>
        <div class="col-12 text-right shadow-lg  col-md-7">
    @foreach($item->comments->where('status', 2) as $comment)

        @include('frontend.comment.item',$comment)

    @endforeach
        </div>
        <div class="col-12 col-md-3"></div>
    </div>

@else
    @include('frontend.comment.no-item')
@endif



