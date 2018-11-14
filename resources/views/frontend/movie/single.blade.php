@extends('layouts.frontend')
@section('metaTag')
    @if(isset($movieItem))
        <meta name="description" content="{{ $movieItem->summary }}">
        <meta name="keywords" content="{{ $movieItem->meta_keywords }}">
    @endif
@endsection

@section('content')
    @if(isset($movieItem))
        <div class="section-film-preview bg-light w-100">
            <div class="title-film w-100 text-light text-center">
                <span class="pt-3 pb-3 d-block">{{ $movieItem->header_title }}</span>
            </div>
            <div class="film-name-in-preview text-center mt-3">
                {{ $movieItem->subheader_title }}
            </div>
            <div class="row mt-4 mb-3">
                <div class="col-12 col-md-6 text-right mt-3 ">
                    <p class="pr-3"><span class="ml-1"><img src="/img/star.png" alt=""></span>
                        <span class="field-film">نام فیلم : </span> <span>{{ $movieItem->name }}</span></p>
                    <p class="pr-3"><span class="ml-1"><img src="/img/play-button.png" alt=""></span>
                        <span class="field-film">ژانر : </span>
                        <?php $i = 0 ?>
                        @foreach($movieItem->genres as $genre)
                            @if($i == $numberOfGenres - 1 )
                                <span><a href="#">{{ $genre->name }}</a></span>
                            @else
                                <span><a href="#">{{ $genre->name }}</a></span>،
                            @endif
                            <?php $i++ ?>
                        @endforeach

                    </p>
                    <p class="pr-3"><span class="ml-1"><img src="/img/star.png" alt=""></span>
                        <span class="field-film">امتیاز فیلم : </span> <span>{{ $movieItem->rate }}</span></p>
                    <p class="pr-3"><span><img src="/img/flag.png" alt=""></span>
                        <span class="field-film">محصول کشور  : </span>
                        <?php $i = 0 ?>
                        @foreach($movieItem->countries as $country)
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
                        @foreach($movieItem->directors as $director)
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
                        @foreach($movieItem->writers as $writer)
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
                        @foreach($movieItem->actors as $actor)
                            @if($i == $numberOfActors - 1 )
                                <span>{{ $actor->name }}</span>
                            @else
                                <span>{{ $actor->name }}</span>،
                            @endif
                            <?php $i++ ?>
                        @endforeach
                    </p>
                    <p class="pr-3"><span><img src="/img/alarm-clock.png" alt=""></span>
                        <span class="field-film">زمان  : </span> <span>{{ $movieItem->duration }}</span></p>
                    <p class="pr-3"><span><img src="/img/translation.png" alt=""></span>
                        <span class="field-film">زبان  : </span><span>{{ $movieItem->language }}</span></p>
                    <p class="pr-3"><span><img src="/img/appointment.png" alt=""></span>
                        <span class="field-film">تاریخ اکران  : </span> <span>{{ $movieItem->release_year }}</span></p>
                </div>
                <div class="col-12 col-md-5 text-center mt-3">
                    <img src="{{ $movieItem->image }}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="row pr-3 mt-3 pl-3">
                <div class="col-12 w-100 summary-about-film text-right">
                    <p class="field-film">خلاصه داستان فیلم : </p>
                    <p>
                        {{ $movieItem->summary }}
                    </p>
                </div>
            </div>
            <div class="row mr-0  alert alert alert-info download-link-section w-100">

                @foreach($movieItem->download_links as $download_link)

                    <div class="col-12 col-md-12  shadow alert alert-info pr-0 pt-3 pb-3 pl-0 text-right ">
                        <span class="d-inline-block pr-4 pl-2">دانلود با کیفیت </span>
                        <span class="d-inline-block pl-4">{{ $download_link->quality_name }}</span>
                        <a href="{{ $download_link->link }}">
                            <button type="button" class="btn btn-danger">لینک دانلود</button>
                        </a>


                    </div>

                @endforeach

                @foreach($movieItem->subtitles as $subtitle)
                    <div class="col-12 col-md-12  shadow alert alert-info pr-0 pt-3 pb-3 pl-0 text-right ">
                        <a href="{{ $subtitle->download_link }}">
                            <button type="button" class="btn btn-primary">جستجوی زیر نویس</button>
                        </a>
                    </div>
                @endforeach


            </div>
        </div>
    @endif


    <div class="row mr-0 alert alert-info mb-0 download-help-section text-right">
        <p>راهنمای دانلود : </p>
        <p>1 - برای راحتی دانلود از نرم افزار دانلود منیجر استفاده کنید . درصورتی که این نرم افزار را ندارید با کلیک بر روی لینک ، <a href="http://p30download.com/fa/entry/44201/">دانلود نرم افزار دانلود منیجر </a>
            این نرم افزار را دانلود کنید .   </p>
        <p>2 - درصورتی که نرم افزار دانلود منیجر را دارید ولی در هنگام دانلود با مروگر دانلود میکند میتوانید از لینک های زیر استفاده کنید :
            <a href="https://www.sarzamindownload.com/contents/2334/">آموزش فعال کردن دانلود منیجر برای کروم</a>
            <br>
            <a href="http://p30mororgar.ir/firefox/how-to-enable-idm-in-firefox/"> آموزش فعال کردن دانلود منیجر برای فایرفاکس</a></p>
        <p>3 - درصورت خرابی لینک ها کافیست به فول فیلم اطلاع دهید تا در سریع ترین زمان ممکن لینک دانلود سالم را برای شما کاربران فول فیلم تهیه نماییم . </p>
    </div>




    <div class="row mt-3 p-3">
        <div class="pr-0 pb-3 pl-0 bg-light w-100 shadow text-right">
            <div class="comment-title pt-3 pb-3 mb-3 pr-2 pl-2  ">
                <span class="d-block">دیدگاه شما</span>
            </div>
            <form>
                <div class="form-group pr-2 pl-2">
                    <label for="formGroupExampleInput">نام شما</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="لطفا نام خود را در این قسمت وارد کنید">
                </div>
                <div class="form-group pr-2 pt-4 pb-4 pl-2">
                    <label for="exampleInputEmail1">ایمیل شما</label>
                    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="لطفا ایمیل خود را اینجا وارد کنید">
                    <small id="emailHelp" class="form-text text-muted">ایمیل شما به سایر کاربران نشان داده نخواهد شد.</small>
                </div>
                <div class="form-group pr-2 pl-2">
                    <div class="col-md-3">
                        <label for="exampleFormControlTextarea1" class="text-dark"></label>
                    </div>

                    <textarea class="form-control" placeholder="دیدگاه خود را در این قسمت بنویسید ...." id="exampleFormControlTextarea1" rows="6"></textarea>

                </div>

                <button type="submit" class="btn btn-primary mr-3 d-inline-block">ارسال نظر</button>
            </form>
        </div>
        <div class="col-12 col-md-3"></div>
    </div>
    <div class="row mt-3">
        <div class="col-12 text-right shadow-lg">
            <div class="row mb-3 mt-3">
                <div class="comment-box pt-4 mr-3 ml-3">
                    <div class="header-comment pt-3 pb-3 pr-3 shadow-sm bg-light w-100">
                        <div class="comment-name d-inline-block w-25">
                            <span>هادی : </span>
                        </div>
                        <div class="comment-date-time d-inline-block w-50">
                            <span class="comment-time d-inline-block pl-4" ><span> تاریخ :</span> 28 / 11 / 1373</span>
                            <span class="comment-time d-inline-block pr-2" ><span>ساعت : </span>15:25</span>
                        </div>
                    </div>
                    <div class="body-comment pt-4  w-100">
                        <p>
                            ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربر
                        </p>
                    </div>

                    <div class="comment-reply d-none bg-light mr-5 mt-3 pr-3">
                        <div class="comment-reply-title">
                            ادمین :
                        </div>
                        <div class="comment-reply-body">
                            <p> این جواب کامنت هست </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3 mt-3">
                <div class="comment-box pt-4 mr-3 ml-3">
                    <div class="header-comment pt-3 pb-3 pr-3 shadow-sm bg-light w-100">
                        <div class="comment-name d-inline-block w-25">
                            <span>هادی : </span>
                        </div>
                        <div class="comment-date-time d-inline-block w-50">
                            <span class="comment-time d-inline-block pl-4" ><span> تاریخ :</span> 28 / 11 / 1373</span>
                            <span class="comment-time d-inline-block pr-2" ><span>ساعت : </span>15:25</span>
                        </div>
                    </div>
                    <div class="body-comment pt-4  w-100">
                        <p>
                            ورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربر
                        </p>
                    </div>

                </div>
            </div>

        </div>

        <div class="col-12 col-md-3"></div>
    </div>



@endsection