@extends('layouts.frontend')
@section('metaTag')
    @if(isset($movieItem))
        <meta name="description" content="{{ $movieItem->summary }}">
        <meta name="keywords" content="{{ $movieItem->meta_keywords }}">
    @endif
@endsection

@section('content')
    @if(isset($serialItem))
        <div class="section-film-preview bg-light w-100">
            <div class="title-film w-100 text-light text-center">
                <span class="pt-3 pb-3 d-block">{{ $serialItem->header_title }}</span>
            </div>
            <div class="film-name-in-preview text-center mt-3">
                <h1 style="font-size:1.5rem !important;">{{ $serialItem->subheader_title }}</h1>
            </div>
            <div class="row mt-4 mb-3">
                <div class="col-12 col-md-6 text-right mt-3 ">
                    <p class="pr-3"><span class="ml-1"><img src="/img/star.png" alt=""></span>
                        <span class="field-film">نام فیلم : </span> <span>{{ $serialItem->name }}</span></p>
                    <p class="pr-3"><span class="ml-1"><img src="/img/play-button.png" alt=""></span>
                        <span class="field-film">ژانر : </span>
                        <?php $i = 0 ?>
                        @foreach($serialItem->genres as $genre)
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
                        <span class="field-film">امتیاز فیلم : </span> <span>{{ $serialItem->rate }}</span></p>
                    <p class="pr-3"><span><img src="/img/flag.png" alt=""></span>
                        <span class="field-film">محصول کشور  : </span>
                        <?php $i = 0 ?>
                        @foreach($serialItem->countries as $country)
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
                        @foreach($serialItem->directors as $director)
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
                        @foreach($serialItem->writers as $writer)
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
                        @foreach($serialItem->actors as $actor)
                            @if($i == $numberOfActors - 1 )
                                <span>{{ $actor->name }}</span>
                            @else
                                <span>{{ $actor->name }}</span>،
                            @endif
                            <?php $i++ ?>
                        @endforeach
                    </p>
                    <p class="pr-3"><span><img src="/img/alarm-clock.png" alt=""></span>
                        <span class="field-film">زمان  : </span> <span>{{ $serialItem->duration }}</span></p>
                    <p class="pr-3"><span><img src="/img/translation.png" alt=""></span>
                        <span class="field-film">زبان  : </span><span>{{ $serialItem->language }}</span></p>
                    <p class="pr-3"><span><img src="/img/appointment.png" alt=""></span>
                        <span class="field-film">تاریخ اکران  : </span>
                        <span>{{ $serialItem->release_date->todatestring() }}</span></p>
                </div>
                <div class="col-12 col-md-5 text-center mt-3">
                    <img src="{{ $serialItem->image }}" class="img-fluid" alt="{{ $serialItem->image_alt }}">
                </div>
            </div>
            <div class="row pr-3 mt-3 pl-3">
                <div class="col-12 w-100 summary-about-film text-right">
                    <p class="field-film">خلاصه داستان فیلم : </p>
                    <p>
                        {{ $serialItem->summary }}
                    </p>
                </div>
            </div>
            <div class="row mr-0  alert alert-success w-100">

            @foreach($serialItem->seasons as $season)
                @foreach($season->episodes as $episode)
                    <!---------- DIV TEKRARI LINK DOWNLOAD -->
                        <div class="col-12 col-md-12  shadow alert alert-success pr-0 pt-3 pb-3 pl-0 text-right">
                            <div class="pr-4 pb-3 font-weight-bold text-center">
                                <span> قسمت </span> <span> {{ $episode->episode_number }} </span><span> فصل </span><span> {{ $season->season_number }} </span>
                            </div>
                            @foreach($episode->download_links as $dl)
                                <span class="d-inline-block pr-4 pl-2">دانلود با کیفیت </span><span
                                        class="d-inline-block pl-4">{{ $dl->quality_name }}</span>
                                <a href="{{ $dl->link }}">
                                    <button type="button" class="btn btn-danger">لینک دانلود</button>
                                </a>
                            @endforeach
                            @foreach($episode->subtitles as $sub)
                                <a href="{{ $sub->download_link }}">
                                    <button type="button" class="btn btn-primary">جستجوی زیر نویس</button>
                                </a>
                            @endforeach

                        </div>
                @endforeach
            @endforeach


            </div>
        </div>
    @endif








@endsection

@section('helpDownload')
    @include('frontend.partials.helpDownload')
@endsection

@section('comment')

@endsection
