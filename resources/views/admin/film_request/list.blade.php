<table>
    <thead>
        @include('admin.film_request.columns')
    </thead>

    <tbody>

    @if($film_requests && count($film_requests) > 0 )
        @foreach($film_requests as $film_request)
            @include('admin.film_request.item',$film_request)
        @endforeach

    @else
        @include('admin.film_request.no-item')
    @endif

    </tbody>

</table>

