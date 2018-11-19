<div class="row mt-3">
    <div class="col-12 text-right shadow-lg">
        <div class="row mb-3 mt-3">
            <div class="comment-box pt-4 mr-3 ml-3">
                <?php
                $temp = \Morilog\Jalali\CalendarUtils::strftime('Y/m/d', strtotime($comment->created_at));
                $date = \Morilog\Jalali\CalendarUtils::convertNumbers($temp);
                $temp = \Morilog\Jalali\CalendarUtils::strftime('H:i:s', strtotime($comment->created_at));
                $time = \Morilog\Jalali\CalendarUtils::convertNumbers($temp);
                ?>

                <div class="header-comment pt-3 pb-3 pr-3 shadow-sm bg-light w-100">


                    <div class="comment-name d-inline-block w-25">
                        <span>{{ $comment->sender_name }}</span>
                    </div>
                    <div class="comment-date-time d-inline-block w-50">
                        <span class="comment-time d-inline-block pl-4" ><span> تاریخ :</span>{{ $date }}</span>
                        <span class="comment-time d-inline-block pr-2" ><span>ساعت : </span>{{ $time }}</span>
                    </div>
                </div>
                <div class="body-comment pt-4  w-100">
                    <p>
                        {{ $comment->body }}
                    </p>
                </div>


                @if($comment->replies && count($comment->replies) > 0)


                    <div class="comment-reply bg-light mr-5 mt-3 pr-3">
                        @foreach($comment->replies as $reply)
                            <?php
                            $temp = \Morilog\Jalali\CalendarUtils::strftime('Y/m/d', strtotime($reply->created_at));
                            $date = \Morilog\Jalali\CalendarUtils::convertNumbers($temp);
                            $temp = \Morilog\Jalali\CalendarUtils::strftime('H:i:s', strtotime($reply->created_at));
                            $time = \Morilog\Jalali\CalendarUtils::convertNumbers($temp);
                            ?>

                            <div class="comment-date-time d-inline-block w-50">
                                <span class="comment-time d-inline-block pl-4" ><span> تاریخ :</span>{{ $date }}</span>
                                <span class="comment-time d-inline-block pr-2" ><span>ساعت : </span>{{ $time }}</span>
                            </div>
                            <div class="comment-reply-title">
                                ادمین :
                            </div>
                            @include('frontend.comment.answer',$reply)
                        @endforeach

                    </div>
                @endif

            </div>
        </div>

    </div>

    <div class="col-12 col-md-3"></div>
</div>