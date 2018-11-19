<div class="row mt-3">
    <div class="pr-0 pb-3 pl-0 bg-light w-100 shadow text-right">
        <div class="comment-title pt-3 pb-3 mb-3 pr-2 pl-2  ">
            <span class="d-block">دیدگاه شما</span>
        </div>
        <form method="post" action="{{ route('frontend.comment.store',['id' => $item->id,$flag]) }}">
            {!! csrf_field() !!}
            <div class="form-group pr-2 pl-2">
                <label for="formGroupExampleInput">نام شما</label>
                <input type="text" class="form-control" name="sender_name" id="comment_sender_name"
                       placeholder="لطفا نام خود را در این قسمت وارد کنید">
            </div>
            <div class="form-group pr-2 pt-4 pb-4 pl-2">
                <label for="exampleInputEmail1">ایمیل شما</label>
                <input type="email" class="form-control" name="sender_email" id="comment_sender_email"
                       aria-describedby="emailHelp" placeholder="لطفا ایمیل خود را اینجا وارد کنید">
                <small id="emailHelp" class="form-text text-muted">ایمیل شما به سایر کاربران نشان داده نخواهد شد.
                </small>
            </div>
            <div class="form-group pr-2 pl-2">
                <div class="col-md-3">
                    <label for="exampleFormControlTextarea1" class="text-dark"></label>
                </div>

                <textarea class="form-control" placeholder="دیدگاه خود را در این قسمت بنویسید ...." name="body"
                          id="comment_body" rows="6"></textarea>

            </div>

            <button type="submit" class="btn btn-primary mr-3 d-inline-block">ارسال نظر</button>
        </form>
    </div>
    <div class="col-12 col-md-3"></div>
</div>
