@extends('layouts.frontend')

@section('content')

    <div class="col-12 col-md-7 shadow-sm pt-4">
        <form class="text-right" method="post" action="{{ route('frontend.contact_us.store')}}">

            {{ csrf_field() }}

            <div class="form-group pb-3 row">
                <label for="inputEmail3" class="col-12 col-md-4 col-form-label">نام(اختیاری )</label>
                <div class="col-12 col-md-7">
                    <input type="text" class="form-control" name="name" id="name" placeholder="">
                </div>
            </div>
            <div class="form-group pt-3 pb-4 row">
                <label for="inputPassword3" class="col-12 col-md-4 col-form-label">ایمیل </label>
                <div class="col-12 col-md-7">
                    <input type="email" class="form-control" name="email" id="email" placeholder="">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">متن پیام </label>
                <textarea class="form-control" name="body" id="body" rows="8"></textarea>
            </div>
            <div class="form-group row justify-content-center">
                <div class="col-12 text-center pt-5">
                    <button type="submit" class="btn btn-primary justify-content-center">ارسال درخواست</button>
                </div>
            </div>
        </form>
    </div>

@endsection