<tr>

    <td>{{ $film_request->subject }}</td>
    <td>{{ $film_request->name }}</td>
    <td>{{ $film_request->email }}</td>
    <td>{{ $film_request->body }}</td>
    <td><a href="{{ route('admin.film_request.sendMail',[$film_request->id])  }}">ارسال ایمیل تایید</a></td>


</tr>