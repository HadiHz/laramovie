@extends('layouts.admin')
@section('content')

    @include('admin.partials.notifications')

    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-newComment-tab" data-toggle="tab" href="#nav-newComment" role="tab" aria-controls="nav-newComment" aria-selected="true">جدید</a>
            <a class="nav-item nav-link" id="nav-accepted-tab" data-toggle="tab" href="#nav-accepted" role="tab" aria-controls="nav-accepted" aria-selected="false">آرشیو ارتباطات</a>
        </div>
    </nav>

    <div class="tab-content col-12 col-md-10 bg-light" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-newComment" role="tabpanel" aria-labelledby="nav-newComment-tab">



            <table class="table table-striped text-right">
                <thead>
                @include('admin.film_request.columns')
                </thead>


                @if($contact_uses && count($contact_uses) > 0)
                    @foreach($contact_uses as $contact_us)

                        @if($contact_us->status == 1)
                            @include('admin.contact_us.item',$contact_us)
                        @endif
                    @endforeach
                @else
                    @include('admin.contact_us.no-item')
                @endif
            </table>



        </div>
        <div class="tab-pane fade show" id="nav-accepted" role="tabpanel" aria-labelledby="nav-accepted-tab">

            <table class="table table-striped text-right">
                <thead>
                @include('admin.film_request.columns')
                </thead>


                @if($contact_uses && count($contact_uses) > 0)
                    @foreach($contact_uses as $contact_us)

                        @if($contact_us->status == 2)
                            @include('admin.contact_us.item',$contact_us)
                        @endif
                    @endforeach
                @else
                    @include('admin.contact_us.no-item')
                @endif
            </table>

        </div>
    </div>


@endsection