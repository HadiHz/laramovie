@extends('layouts.frontend')

@section('newFilm')
    <!--START SECTION NEW FILM-->
    <div class="section-new-film pb-5">
        <div class="container ">
            <div class="row row-new-film shadow-lg">
                @for($i = 0 ; $i < 3 ; $i++)
                    @if($newPosts[$i] instanceof \App\Models\Movie )
                        <div class="col-10   col-md-4" data-toggle="tooltip" data-placement="top"
                             title="{{ $newPosts[$i]->header_title }}">

                            <a href="{{ route('frontend.movies.single' , $newPosts[$i]->slug) }}">
                                <div class="card text-white shadow mt-3 mb-5">
                                    <img class="card-img" src="{{ $newPosts[$i]->image }}"
                                         alt="{{ $newPosts[$i]->image_alt }}">
                                    <div class="card-img-overlay w-100 h-100 hidden-detail">

                                        <p class="card-text ">{{ $newPosts[$i]->summary }}</p>
                                        <p class="card-text w-100 float-right">
                                            <button type="button" class="btn btn-info  w-100">دانلود</button>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-10   col-md-4" data-toggle="tooltip" data-placement="top"
                             title="{{ $newPosts[$i]->header_title }}">

                            <a href="{{ route('frontend.serials.single' , $newPosts[$i]->slug) }}">
                                <div class="card text-white shadow mt-3 mb-5">
                                    <img class="card-img" src="{{ $newPosts[$i]->image }}"
                                         alt="{{ $newPosts[$i]->image_alt }}">
                                    <div class="card-img-overlay w-100 h-100 hidden-detail">

                                        <p class="card-text ">{{ $newPosts[$i]->summary }}</p>
                                        <p class="card-text w-100 float-right">
                                            <button type="button" class="btn btn-info  w-100">دانلود</button>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endfor


            </div>
            <div class="row row-new-film shadow-lg">

                @for($i = 3; $i < 7 ; $i++)
                    @if($newPosts[$i] instanceof \App\Models\Movie )
                        <div class="col-10 col-md-3">
                            <a href="{{ route('frontend.movies.single' , $newPosts[$i]->slug) }}">
                                <div class="card text-white shadow mt-3 mb-5">
                                    <img class="card-img" src="{{ $newPosts[$i]->image }}"
                                         alt="{{ $newPosts[$i]->image_alt }}">
                                    <div class="card-img-overlay w-100 h-100 hidden-detail">

                                        <p class="card-text ">{{ $newPosts[$i]->summary }}</p>
                                        <p class="card-text w-100 float-right">
                                            <button type="button" class="btn btn-info  w-100">دانلود</button>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="col-10 col-md-3">
                            <a href="{{ route('frontend.serials.single' , $newPosts[$i]->slug) }}">
                                <div class="card text-white shadow mt-3 mb-5">
                                    <img class="card-img" src="{{ $newPosts[$i]->image }}"
                                         alt="{{ $newPosts[$i]->image_alt }}">
                                    <div class="card-img-overlay w-100 h-100 hidden-detail">

                                        <p class="card-text ">{{ $newPosts[$i]->summary }}</p>
                                        <p class="card-text w-100 float-right">
                                            <button type="button" class="btn btn-info  w-100">دانلود</button>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endfor

            </div>
        </div>
    </div>
    <!--END SECTION NEW FILM-->
@endsection

@section('content')
    @foreach($allResults as $result)

        @if($result instanceof \App\Models\Movie)
            <?php
            $movie = $result;
            $numberOfGenres = count($movie->genres);
            $numberOfCountries = count($movie->countries);
            $numberOfDirectors = count($movie->directors);
            $numberOfActors = count($movie->actors);
            $numberOfWriters = count($movie->writers);
            ?>
            <div class="section-film-preview bg-light w-100">
                <div class="title-film w-100 text-light text-center">
                    <span class="pt-3 pb-3 d-block">{{ $movie->header_title }}</span>
                </div>
                <div class="film-name-in-preview text-center mt-3">
                    {{ $movie->subheader_title }}
                </div>
                <div class="row mt-4 mb-3">
                    <div class="col-12 col-md-6 text-right mt-3 ">
                        <p class="pr-3"><span class="ml-1"><img src="/img/star.png" alt=""></span>
                            <span class="field-film">نام فیلم : </span> <span>{{ $movie->name }}</span></p>
                        <p class="pr-3"><span class="ml-1"><img src="/img/play-button.png" alt=""></span>
                            <span class="field-film">ژانر : </span>
                            <?php $i = 0 ?>
                            @foreach($movie->genres as $genre)
                                @if($i == $numberOfGenres - 1 )
                                    <span><a href="{{ route('frontend.genres.index' ,$genre->slug) }}">{{ $genre->name }}</a></span>
                                @else
                                    <span><a href="{{ route('frontend.genres.index' ,$genre->slug) }}">{{ $genre->name }}</a></span>
                                    ،
                                @endif
                                <?php $i++ ?>
                            @endforeach

                        </p>
                        <p class="pr-3"><span class="ml-1"><img src="/img/star.png" alt=""></span>
                            <span class="field-film">امتیاز فیلم : </span> <span>{{ $movie->rate }}</span></p>
                        <p class="pr-3"><span><img src="/img/flag.png" alt=""></span>
                            <span class="field-film">محصول کشور  : </span>
                            <?php $i = 0 ?>
                            @foreach($movie->countries as $country)
                                @if($i == $numberOfCountries - 1 )
                                    <span>{{ $country->name }}</span>
                                @else
                                    <span>{{ $country->name }}</span>،
                                @endif
                                <?php $i++ ?>
                            @endforeach
                        </p>
                        <p class="pr-3"><span><img src="/img/video-camera%20(1).png" alt=""></span>
                            <span class="field-film">کارگردان  : </span>
                            <?php $i = 0 ?>
                            @foreach($movie->directors as $director)
                                @if($i == $numberOfDirectors - 1 )
                                    <span>{{ $director->name }}</span>
                                @else
                                    <span>{{ $director->name }}</span>،
                                @endif
                                <?php $i++ ?>
                            @endforeach
                        </p>
                        <p class="pr-3"><span><img src="/img/pen.png" alt=""></span>
                            <span class="field-film">نویسنده  : </span>
                            <?php $i = 0 ?>
                            @foreach($movie->writers as $writer)
                                @if($i == $numberOfWriters - 1 )
                                    <span>{{ $writer->name }}</span>
                                @else
                                    <span>{{ $writer->name }}</span>،
                                @endif
                                <?php $i++ ?>
                            @endforeach
                        </p>
                        <p class="pr-3"><span><img src="/img/avatar.png" alt=""></span>
                            <span class="field-film">بازیگران  : </span>
                            <?php $i = 0 ?>
                            @foreach($movie->actors as $actor)
                                @if($i == $numberOfActors - 1 )
                                    <span>{{ $actor->name }}</span>
                                @else
                                    <span>{{ $actor->name }}</span>،
                                @endif
                                <?php $i++ ?>
                            @endforeach
                        </p>
                        <p class="pr-3"><span><img src="/img/alarm-clock.png" alt=""></span>
                            <span class="field-film">زمان  : </span> <span>{{ $movie->duration }}</span></p>
                        <p class="pr-3"><span><img src="/img/translation.png" alt=""></span>
                            <span class="field-film">زبان  : </span><span>{{ $movie->language }}</span></p>
                        <p class="pr-3"><span><img src="/img/appointment.png" alt=""></span>
                            <span class="field-film">تاریخ اکران  : </span> <span>{{ $movie->release_year }}</span></p>
                    </div>
                    <div class="col-12 col-md-5 text-center mt-3">
                        <img src="{{ $movie->image }}" class="img-fluid" alt="{{ $movie->image_alt }}">
                    </div>
                </div>
                <div class="row pr-3 mt-3 pl-3">
                    <div class="col-12 w-100 summary-about-film text-right">
                        <p class="field-film">خلاصه داستان فیلم : </p>
                        <p>
                            {{ $movie->summary }}
                        </p>
                    </div>
                </div>
                <div class="row mr-0 text-center download-link-section w-100">
                    <div class="col-12 col-md-6 time-section text-light pr-0 pt-3 pb-3 pl-0 ">
                        <span>تاریخ انتشار : </span><span>{{ $movie->updated_at }}</span>
                    </div>
                    <div class="col-12 col-md-6 text-white download-link-section pr-0 pt-3 pb-3 pl-0 ">
                        <a href="{{ route('frontend.movies.single' , $movie->slug) }}">ادامه ی مطلب</a>
                    </div>
                </div>
            </div>

        @else
            @if($result instanceof \App\Models\Serial)
                <?php
                $serial = $result;
                $numberOfGenres = count($serial->genres);
                $numberOfCountries = count($serial->countries);
                $numberOfDirectors = count($serial->directors);
                $numberOfActors = count($serial->actors);
                $numberOfWriters = count($serial->writers);
                ?>
                <div class="section-film-preview bg-light w-100">
                    <div class="title-film w-100 text-light text-center">
                        <span class="pt-3 pb-3 d-block">{{ $serial->header_title }}</span>
                    </div>
                    <div class="film-name-in-preview text-center mt-3">
                        {{ $serial->subheader_title }}
                    </div>
                    <div class="row mt-4 mb-3">
                        <div class="col-12 col-md-6 text-right mt-3 ">
                            <p class="pr-3"><span class="ml-1"><img src="/img/star.png" alt=""></span>
                                <span class="field-film">نام سریال : </span> <span>{{ $serial->name }}</span></p>
                            <p class="pr-3"><span class="ml-1"><img src="/img/play-button.png" alt=""></span>
                                <span class="field-film">ژانر : </span>
                                <?php $i = 0 ?>
                                @foreach($serial->genres as $genre)
                                    @if($i == $numberOfGenres - 1 )
                                        <span><a href="{{ route('frontend.genres.index' ,$genre->slug) }}">{{ $genre->name }}</a></span>
                                    @else
                                        <span><a href="{{ route('frontend.genres.index' ,$genre->slug) }}">{{ $genre->name }}</a></span>
                                        ،
                                    @endif
                                    <?php $i++ ?>
                                @endforeach

                            </p>
                            <p class="pr-3"><span class="ml-1"><img src="/img/star.png" alt=""></span>
                                <span class="field-film">امتیاز سریال : </span> <span>{{ $serial->rate }}</span></p>
                            <p class="pr-3"><span><img src="/img/flag.png" alt=""></span>
                                <span class="field-film">محصول کشور  : </span>
                                <?php $i = 0 ?>
                                @foreach($serial->countries as $country)
                                    @if($i == $numberOfCountries - 1 )
                                        <span>{{ $country->name }}</span>
                                    @else
                                        <span>{{ $country->name }}</span>،
                                    @endif
                                    <?php $i++ ?>
                                @endforeach
                            </p>
                            <p class="pr-3"><span><img src="/img/video-camera%20(1).png" alt=""></span>
                                <span class="field-film">کارگردان  : </span>
                                <?php $i = 0 ?>
                                @foreach($serial->directors as $director)
                                    @if($i == $numberOfDirectors - 1 )
                                        <span>{{ $director->name }}</span>
                                    @else
                                        <span>{{ $director->name }}</span>،
                                    @endif
                                    <?php $i++ ?>
                                @endforeach
                            </p>
                            <p class="pr-3"><span><img src="/img/pen.png" alt=""></span>
                                <span class="field-film">نویسنده  : </span>
                                <?php $i = 0 ?>
                                @foreach($serial->writers as $writer)
                                    @if($i == $numberOfWriters - 1 )
                                        <span>{{ $writer->name }}</span>
                                    @else
                                        <span>{{ $writer->name }}</span>،
                                    @endif
                                    <?php $i++ ?>
                                @endforeach
                            </p>
                            <p class="pr-3"><span><img src="/img/avatar.png" alt=""></span>
                                <span class="field-film">بازیگران  : </span>
                                <?php $i = 0 ?>
                                @foreach($serial->actors as $actor)
                                    @if($i == $numberOfActors - 1 )
                                        <span>{{ $actor->name }}</span>
                                    @else
                                        <span>{{ $actor->name }}</span>،
                                    @endif
                                    <?php $i++ ?>
                                @endforeach
                            </p>
                            <p class="pr-3"><span><img src="/img/alarm-clock.png" alt=""></span>
                                <span class="field-film">زمان  : </span> <span>{{ $serial->duration }}</span></p>
                            <p class="pr-3"><span><img src="/img/translation.png" alt=""></span>
                                <span class="field-film">زبان  : </span><span>{{ $serial->language }}</span></p>
                            <p class="pr-3"><span><img src="/img/appointment.png" alt=""></span>
                                <span class="field-film">تاریخ اکران  : </span> <span>{{ $serial->release_year }}</span>
                            </p>
                            <p class="pr-3"><span><img src="/img/shield.png" alt=""></span>
                                <span class="field-film">تعداد فصل  : </span><span>{{ $serial->number_of_seasons }}</span>
                            </p>
                        </div>
                        <div class="col-12 col-md-5 text-center mt-3">
                            <img src="{{ $serial->image }}" class="img-fluid" alt="{{ $serial->image_alt }}">
                        </div>
                    </div>
                    <div class="row pr-3 mt-3 pl-3">
                        <div class="col-12 w-100 summary-about-film text-right">
                            <p class="field-film">خلاصه داستان سریال : </p>
                            <p>
                                {{ $serial->summary }}
                            </p>
                        </div>
                    </div>
                    <div class="row mr-0 text-center download-link-section w-100">
                        <div class="col-12 col-md-6 time-section text-light pr-0 pt-3 pb-3 pl-0 ">
                            <span>تاریخ انتشار : </span><span>{{ $serial->updated_at }}</span>
                        </div>
                        <div class="col-12 col-md-6 text-white download-link-section pr-0 pt-3 pb-3 pl-0 ">
                            <a href="{{ route('frontend.serials.single' , $serial->slug) }}">ادامه ی مطلب</a>
                        </div>
                    </div>
                </div>
            @endif
        @endif

    @endforeach
@endsection

@section('pagination')
    {{ $allResults->links() }}
@endsection