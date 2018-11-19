<tr class="table-primary" style="{{($contact_us->status == 1) ?  'font-weight: bold': ''}}">

    <td>{{ $contact_us->name }}</td>
    <td>{{ $contact_us->email }}</td>
    <td>{{ $contact_us->body }}</td>
    <td>
        @if($contact_us->status == 1)
            <a type="button" class="btn btn-warning  mt-2 mb-2" href="{{ route('admin.contact_us.seen',[$contact_us->id])  }}">مشاهده شد</a>
        @endif
    </td>
    <td>
        <a type="button" class="btn btn-warning  mt-2 mb-2" href="{{ route('admin.contact_us.remove',[$contact_us->id])  }}">حذف</a>
    </td>
</tr>