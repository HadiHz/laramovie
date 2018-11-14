@extends('layouts.frontend')

@section('newFilm')

@endsection

@section('content')
    @foreach($allResults as $result)
        <p>
            @if($result instanceof \App\Models\Movie)
                {{ $result->name }}
            @endif
        </p>
    @endforeach
@endsection

@section('pagination')
    {{ $allResults->links() }}
@endsection