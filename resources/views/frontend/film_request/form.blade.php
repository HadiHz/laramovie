@extends('layouts.frontend')

@section('content')
<!-------Main Form -------->
<div class="request-film bg-light pt-3">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-7 shadow-sm pt-4">
                <form class="text-right" method="post" action="{{ route('frontend.film_request.store')}}">

                    {{ csrf_field() }}

                    <div class="form-group pb-3 row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">نام (اختیاری)</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="name" id="name" placeholder="نام">
                        </div>
                    </div>

                    <div class="form-group pb-3 row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">آدرس ایمیل</label>
                        <div class="col-sm-9">
                            <input class="form-control" name="email" id="email" placeholder="لطفا ایمیل خود را وارد کنید">
                        </div>
                    </div>

                    <div class="form-group pb-3 row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">عنوان درخواست</label>
                        <div class="col-sm-9">
                            <input name="subject" id="subject" placeholder="عنوان درخواست را وارد کنید">
                        </div>
                    </div>

                    <div class="form-group pt-3 pb-4 row">
                        <label for="inputPassword3" class="col-sm-3 col-form-label">متن درخواست</label>
                        <div class="col-sm-9">
                            <textarea type="text" class="form-control" name="body" id="comment_body">
                            </textarea>

                        </div>
                    </div>

                    <div class="form-group row justify-content-center">
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-primary justify-content-center">ارسال درخواست</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('partials.errors')

</div>

@endsection