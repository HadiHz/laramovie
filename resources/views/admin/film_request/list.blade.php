@extends('layouts.admin')
@section('content')

    @include('admin.partials.notifications')

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-newComment-tab" data-toggle="tab" href="#nav-newComment" role="tab" aria-controls="nav-newComment" aria-selected="true">جدید</a>
            <a class="nav-item nav-link" id="nav-accepted-tab" data-toggle="tab" href="#nav-accepted" role="tab" aria-controls="nav-accepted" aria-selected="false">اعلام موافقت</a>
            <a class="nav-item nav-link" id="nav-rejected-tab" data-toggle="tab" href="#nav-rejected" role="tab" aria-controls="nav-rejected" aria-selected="false">موجود در سایت</a>
        </div>
    </nav>

    <div class="tab-content col-12 col-md-10 bg-light" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-newComment" role="tabpanel" aria-labelledby="nav-newComment-tab">



            <table class="table table-striped text-right">
                <thead>
                @include('admin.film_request.columns')
                </thead>


                @if($film_requests && count($film_requests) > 0)
                    @foreach($film_requests as $film_request)

                        @if($film_request->status == 1)
                            @include('admin.film_request.item',$film_request)
                        @endif
                    @endforeach
                @else
                    @include('admin.film_request.no-item')
                @endif
            </table>



        </div>
        <div class="tab-pane fade show" id="nav-accepted" role="tabpanel" aria-labelledby="nav-accepted-tab">



            <table class="table table-striped text-right">
                <thead>
                @include('admin.film_request.columns')
                </thead>

                @if($film_requests && count($film_requests) > 0)
                    @foreach($film_requests as $film_request)

                        @if($film_request->status == 2)
                            @include('admin.film_request.item',$film_request)
                        @endif
                    @endforeach
                @else
                    @include('admin.film_request.no-item')
                @endif
            </table>



        </div>
        <div class="tab-pane fade show" id="nav-rejected" role="tabpanel" aria-labelledby="nav-rejected-tab">

            <table class="table table-striped text-right">
                <thead>
                @include('admin.film_request.columns')
                </thead>
                @if($film_requests && count($film_requests) > 0)
                    @foreach($film_requests as $film_request)

                        @if($film_request->status == 3)
                            @include('admin.film_request.item',$film_request)
                        @endif
                    @endforeach
                @else
                    @include('admin.film_request.no-item')
                @endif
            </table>


        </div>

    </div>


@endsection