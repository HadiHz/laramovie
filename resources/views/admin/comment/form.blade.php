<div class="row">

    @if($comments && count($comments) > 0 )
        @foreach($comments as $comment)
            <tr>
                <td>{{ $comment->sender }}</td>
                <td>{{ $comment->body }}</td>
            </tr>
        @endforeach

    @else
        <tr>
            <td colspan="5">
                <span>هیچ اطلاعاتی برای نمایش وجود ندارد.</span>
            </td>
        </tr>
    @endif


</div>