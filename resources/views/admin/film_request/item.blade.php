<tr class="table-primary" style="{{($film_request->status == 1) ?  'font-weight: bold': ''}}">

    <td>{{ $film_request->subject }}</td>
    <td>{{ $film_request->name }}</td>
    <td>{{ $film_request->email }}</td>
    <td>{{ $film_request->body }}</td>
    <td>
        @if($film_request->status == 1)
            <a type="button" class="btn btn-success" href="{{ route('admin.film_request.sendMail',[$film_request->id,'flag' => 1])  }}">اعلام موافقت</a>
            <a type="button" class="btn btn-warning  mt-2 mb-2" href="{{ route('admin.film_request.sendMail',[$film_request->id,'flag' => 2])  }}">در سایت موجود است</a>
        @endif
    </td>
    <td>
        <a type="button" class="btn btn-warning  mt-2 mb-2" href="{{ route('admin.film_request.remove',[$film_request->id])  }}">حذف</a>
    </td>
</tr>