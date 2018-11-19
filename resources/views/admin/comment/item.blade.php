<tr style="{{($comment->status == 3) ?  'color: red': ($comment->status == 1 ? 'font-weight: bold' : '' )}}">

    <td>{{ $comment->commentable()->first()->name }}</td>
    <td>{{  $comment->sender_name  }}</td>
    <td>{{  $comment->sender_email  }}</td>
    <td>{{  $comment->body  }}</td>
    <!-- باید بدونیم کامنت مربوط به کدوم پست هست -->
    <td>

        @if($comment->status == 1 || $comment->status == 3)
            <a href="{{ route('admin.comments.verify',[$comment->id,'flag'=>1])  }}">تایید</a>
            <a href="{{ route('admin.comments.remove',[$comment->id])  }}">حذف</a>
        @endif

        @if($comment->status == 1 || $comment->status == 2)
            <a href="{{ route('admin.comments.verify',[$comment->id,'flag'=>2])  }}">رد</a>

        @endif

        @if($comment->status == 2)
            <a href="{{ route('admin.comments.singleshow',[$comment->id])  }}">پاسخ</a>
        @endif

        @if($comment->status == 4)
            <a href="{{ route('admin.comments.edit',[$comment->id])  }}">ویرایش</a>
            <a href="{{ route('admin.comments.remove',[$comment->id])  }}">حذف</a>
            @else
        @endif

    </td>

</tr>