<!doctype html>
<html lang="fa">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

@yield('metaTag')

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/vazir.css">
    <link rel="stylesheet" href="/css/themify-icons.css">
    <title>Hello, world!</title>
</head>
<body>

@include('frontend.partials.header')

@yield('newFilm')

<!-- START SECTION ADVERTISE -->
@include('frontend.partials.advertisements')
<!-- END SECTION ADVERTISE -->


<div class="main-section w-100">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-2 shadow w-100 pl-0 pr-0 sidebar-right">
                <div class="film-genre w-100 text-right">
                    <div class="title-film-genre  mr-2 ml-2 pt-3 pr-3 shadow-sm">
                        <span class="pb-3 d-inline-block "><img src="/img/menu.png" alt=""></span><span class="mr-1">ژانر ها</span>
                    </div>
                    <div class="body-genre-film">
                        @foreach($genres as $genre)

                            <div class=" genre-film-item  pt-3 pb-3 pr-4"><span class="d-inline-block ml-1"><img
                                            src="/img/video.png" alt=""></span><a
                                        href="{{ route('frontend.genres.index' ,$genre->slug) }}"><span>{{ $genre->name }}</span></a>
                            </div>
                        @endforeach


                    </div>

                </div>
                <div class="film-genre w-100 mt-5 text-right">
                    <div class="title-film-genre  mr-2 ml-2 pt-3 pr-3 shadow-sm">
                        <span class="pb-3 d-inline-block "><img src="/img/menu.png" alt=""></span><span class="mr-1">سال تولید</span>
                    </div>
                    <div class="body-genre-film">
                        <div class=" genre-film-item  pt-3 pb-3 pr-4"><span class="d-inline-block ml-1"><img
                                        src="/img/clapperboard%20(1).png" alt=""></span><span>2018</span></div>
                        <div class=" genre-film-item  pt-3 pb-3 pr-4"><span class="d-inline-block ml-1"><img
                                        src="/img/clapperboard%20(1).png" alt=""></span><span>2018</span></div>
                        <div class=" genre-film-item  pt-3 pb-3 pr-4"><span class="d-inline-block ml-1"><img
                                        src="/img/clapperboard%20(1).png" alt=""></span><span>2018</span></div>
                        <div class=" genre-film-item  pt-3 pb-3 pr-4"><span class="d-inline-block ml-1"><img
                                        src="/img/clapperboard%20(1).png" alt=""></span><span>2018</span></div>
                        <div class=" genre-film-item  pt-3 pb-3 pr-4"><span class="d-inline-block ml-1"><img
                                        src="/img/clapperboard%20(1).png" alt=""></span><span>2018</span></div>


                    </div>

                </div>
            </div>


            <div class="col-12 col-md-7 shadow pr-0 pl-0 film-preview">
                @yield('content')

            </div>


            <div class="col-12 col-md-3 sidebar-left bg-light shadow">
                <div class="new-film w-100 text-right bg-light">
                    <div class="title-new-film pt-3 pr-3 shadow-sm">
                        <span class="pb-3 d-inline-block "><img src="/img/layers.png" alt=""></span><span class="mr-1">آخرین فیلم ها</span>
                    </div>
                    <div class="body-new-list-film">

                        @foreach($latestMovies as $latestMovie)
                            <div class="new-film-item  pt-3 pb-3 pr-4">
                                <a href="{{ route('frontend.movies.single' , $latestMovie->slug) }}"><span>{{ $latestMovie->header_title }}</span></a>
                            </div>
                        @endforeach


                    </div>

                </div>

                <div class="new-film w-100 text-right bg-light">
                    <div class="title-new-film pt-3 mt-2 pr-3 shadow-sm">
                        <span class="pb-3 d-inline-block "><img src="/img/layers.png" alt=""></span><span class="mr-1">آخرین سریال ها</span>
                    </div>
                    <div class="body-new-list-film">
                        @foreach($latestSerials as $latestSerial)
                            <div class="new-film-item  pt-3 pb-3 pr-4">
                                <a href="{{ route('frontend.movies.single' , $latestSerial->slug) }}"><span>{{ $latestSerial->header_title }}</span></a>
                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

            @yield('helpDownload')
            @yield('comment')

        </div>


    </div>
</div>

<div class="pagination">
    <div class="container">
        <div class="row align-self-center">
            <div class="col-10 mr-5 pr-5">
                @yield('pagination')
            </div>
        </div>
    </div>
</div>


@include('frontend.partials.footer')
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
<script>
    $(".hidden-detail").hover(
        function () {
            $(this).addClass('show-detail');
        },
        function () {
            $(this).removeClass("show-detail");
        }, 4000
    );

    $(".genre-film-item").hover(
        function () {
            $(this).addClass('show-background');
        },
        function () {
            $(this).removeClass("show-background");
        }, 4000
    );

    $(".new-film-item").hover(
        function () {
            $(this).addClass('show-new-film-item');
        },
        function () {
            $(this).removeClass('show-new-film-item');
        }, 4000
    );


</script>
</body>
</html>
