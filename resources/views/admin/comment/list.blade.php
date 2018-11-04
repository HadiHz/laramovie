@extends('layouts.admin')
@section('content')



    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-newComment-tab" data-toggle="tab" href="#nav-newComment" role="tab" aria-controls="nav-newComment" aria-selected="true">جدید</a>
            <a class="nav-item nav-link" id="nav-accepted-tab" data-toggle="tab" href="#nav-accepted" role="tab" aria-controls="nav-accepted" aria-selected="false">تایید شده</a>
            <a class="nav-item nav-link" id="nav-rejected-tab" data-toggle="tab" href="#nav-rejected" role="tab" aria-controls="nav-rejected" aria-selected="false">رد شده</a>
            <a class="nav-item nav-link" id="nav-rejected-tab" data-toggle="tab" href="#nav-myanswer" role="tab" aria-controls="nav-myanswer" aria-selected="false">پاسخ های من</a>
        </div>
    </nav>

    <div class="tab-content" id="nav-tabContent">

        <div class="tab-pane fade show active" id="nav-newComment" role="tabpanel" aria-labelledby="nav-newComment-tab">



            <table class="table table-bordered">
                <thead>
                @include('admin.comment.columns')
                </thead>



                @if($comments && count($comments) > 0)

                    @foreach($comments as $comment)

                        @if($comment->status == 1)
                            @include('admin.comment.item',$comment)


                        @endif
                    @endforeach

                @else
                    @include('admin.comment.no-item')
                @endif
            </table>



        </div>
        <div class="tab-pane fade show" id="nav-accepted" role="tabpanel" aria-labelledby="nav-accepted-tab">



            <table class="table table-bordered">
                <thead>
                @include('admin.comment.columns')
                </thead>



                @if($comments && count($comments) > 0)

                    @foreach($comments as $comment)

                        @if($comment->status == 2)
                            @include('admin.comment.item',$comment)


                        @endif
                    @endforeach

                @else
                    @include('admin.comment.no-item')
                @endif
            </table>




        </div>
        <div class="tab-pane fade show" id="nav-rejected" role="tabpanel" aria-labelledby="nav-rejected-tab">

            <table class="table table-bordered">
                <thead>
                @include('admin.comment.columns')
                </thead>



                @if($comments && count($comments) > 0)

                    @foreach($comments as $comment)

                        @if($comment->status == 3)
                            @include('admin.comment.item',$comment)


                        @endif
                    @endforeach

                @else
                    @include('admin.comment.no-item')
                @endif
            </table>


        </div>
        <div class="tab-pane fade show" id="nav-myanswer" role="tabpanel" aria-labelledby="nav-myanswer-tab">

            <table class="table table-bordered">
                <thead>
                @include('admin.comment.columns')
                </thead>



                @if($comments && count($comments) > 0)

                    @foreach($comments as $comment)

                        @if($comment->status == 4)
                            @include('admin.comment.item',$comment)

                        @endif
                    @endforeach

                @else
                    @include('admin.comment.no-item')
                @endif
            </table>


        </div>


    </div>


@endsection