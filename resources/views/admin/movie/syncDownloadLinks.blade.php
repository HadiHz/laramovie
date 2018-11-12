@extends('layouts.admin')
@section('content')

    @include('admin.partials.errors')


    <p>
        <a href="#" class="add_download_item">اضافه کردن آیتم برای دانلود</a>
    </p>




    <form method="post">
        {{ csrf_field() }}
        <div class="download-wrapper">

            @foreach($downloadLinks as $link)
                <div class="input-group">
                    <input dir="ltr" type="text" name="downloadLinks[]" class="form-control"
                           placeholder="لینک دانلود فیلم" value="{{ $link->link }}">
                    <input dir="ltr" type="text" name="downloadLinksScreen[]" class="form-control"
                           placeholder="لینک اسکرین شات" value="{{ $link->screenshot_link }}">
                    <input dir="ltr" type="text" name="downloadLinksQuality[]" class="form-control"
                           placeholder="کیفیت لینک دانلود" value="{{ $link->quality_name }}">
                    <input type="hidden" name="download_link_id[]" value="{{ $link->id }}">
                    <a href="#" class="remove_download_item">حذف</a>
                </div>
            @endforeach

        </div>

        <br>
        <hr>

        <p>
            <a href="#" class="add_subtitle_item">اضافه کردن آیتم برای زیرنویس</a>
        </p>

        <div class="subtitle-wrapper">

            @foreach($subtitles as $subtitle)
                <div class="input-group">
                    <input dir="ltr" type="text" name="subtitleDownloadLinks[]" class="form-control"
                           placeholder="لینک دانلود زیرنویس" value="{{ $subtitle->download_link }}">
                    <input type="hidden" name="subtitle_id[]" value="{{ $subtitle->id }}">
                    <a href="#" class="remove_subtitle_item">حذف</a>
                </div>
            @endforeach

        </div>




        <input class="btn btn-primary" type="submit" value="ذخیره ی اطلاعات">
    </form>
@endsection