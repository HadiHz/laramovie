@extends('layouts.admin')
@section('content')

    @include('admin.partials.errors')
    <form method="post">
        {{ csrf_field() }}
        <div class="row pr-3 pl-3">

            <button id="add_download_link" type="button" class="btn btn-primary ml-3">اضافه کردن لینک دانلود</button>

            <div class="form-group col-md-12 d-inline-block download_wrapper">
                @foreach($download_links as $link)
                    <div class="row mb-3 mt-3 pr-3 pl-3 ">

                        <div class="col-md-3 d-inline-block pl-0">
                            <label for="inputDownloaQuality1" class=" text-dark d-inline-block  col-form-label">
                                کیفیت لینک دانلود : </label>
                            <input name="downloadLinksQuality[]" type="text" class="form-control  d-inline-block w-50" id="inputDownloaQuality1"
                                   placeholder="" value="{{ $link->quality_name }}">
                        </div>
                        <div class="col-md-3 d-inline-block pl-0 pr-0">
                            <label for="inputDownloaQuality1" class=" text-dark d-inline-block  col-form-label">
                                لینک دانلود : </label>
                            <input name="downloadLinks[]" type="text" class="form-control  d-inline-block w-50" id="inputDownloaQuality1"
                                   placeholder="" value="{{ $link->link }}">
                        </div>
                        <div class="col-md-3 d-inline-block pl-0 pr-0">
                            <label for="inputDownloaQuality1" class=" text-dark d-inline-block  col-form-label">
                                اسکرین شات : </label>
                            <input name="downloadLinksScreen[]" type="text" class="form-control  d-inline-block w-50" id="inputDownloaQuality1"
                                   placeholder="" value="{{ $link->screenshot_link }}">
                            <input type="hidden" name="download_link_id[]" value="{{ $link->id }}">
                        </div>
                        <div class="col-12 col-md-2">
                            <button type="button" class="btn btn-danger remove_download_link">حذف لینک دانلود</button>
                        </div>

                    </div>
                @endforeach
            </div>


        </div>


        <div class="row pr-3 mt-5 pl-3">
            <button id="add_subtitle" type="button" class="btn btn-primary ml-3">اضافه کردن لینک دانلود زیر نویس
            </button>

            <div class="form-group col-md-12 d-inline-block subtitle_wrapper">
                @foreach($subtitles as $subtitle)
                    <div class="row mb-3 mt-3 pr-3 pl-3">
                        <div class="col-md-6 d-inline-block pl-0">
                            <label for="inputDownloaQuality1" class=" text-dark d-inline-block  col-form-label">لینک
                                دانلود زیرنویس : </label>
                            <input type="text" name="subtitleDownloadLinks[]" class="form-control  d-inline-block w-50"
                                   id="inputDownloaQuality1"
                                   placeholder="" value="{{ $subtitle->download_link }}">
                            <input type="hidden" name="subtitle_id[]" value="{{ $subtitle->id }}">
                        </div>


                        <div class="col-12 col-md-3">
                            <button type="button" class="btn btn-danger remove_subtitle">حذف لینک دانلود زیرنویس
                            </button>
                        </div>
                    </div>
                @endforeach

            </div>


        </div>


        <div class="row mt-5 float-left ml-4">
            <button type="submit" class="btn btn-success">ذخیره اطلاعات</button>
        </div>

    </form>
@endsection