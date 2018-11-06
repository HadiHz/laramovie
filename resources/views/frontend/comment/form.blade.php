<div class="row">
    آی دی رو برا تست دادم 1 باید بذاری آی دی ای که از پست میگیری
    <form method="post" action="{{ route('frontend.comment.store',['id' => 2,'flag'=>2]) }}">
        {!! csrf_field() !!}
        <h3>نظرات :</h3>
        <input name="sender_name" id="comment_sender_name">
        <input name="sender_email" id="comment_sender_email">
        <input name="body" id="comment_body">
        <button type="submit">ارسال</button>
    </form>
</div>