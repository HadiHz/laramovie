<div class="row">
    <h2>درخواست فیلم</h2>
    <form method="post" action="{{ route('frontend.film_request.store')}}">
        {!! csrf_field() !!}
        <input name="name" id="name" placeholder="نام">
        <input name="email" id="email" placeholder="ایمیل">
        <input name="subject" id="subject" placeholder="عنوان">
        <input name="body" id="comment_body" placeholder="متن درخواست">
        <button type="submit">ارسال</button>
    </form>

    @include('partials.errors')
</div>
