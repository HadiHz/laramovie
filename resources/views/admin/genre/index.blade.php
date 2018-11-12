@extends('layouts.admin')
@section('content')
    @include('admin.partials.notifications')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>شناسه</th>
            <th>عنوان</th>
            <th>کلمات کلیدی</th>
            <th>دیسکریپشن</th>
            <th>عملیات</th>
        </tr>
        </thead>
        @if($genres && count($genres) > 0)

            @foreach($genres as $genre)
                <tr>
                    <td>{{  $genre->id  }}</td>
                    <td>{{  $genre->name  }}</td>
                    <td>{{  $genre->meta_keywords  }}</td>
                    <td>{{  $genre->meta_description  }}</td>
                    <td>
                        <a href="{{ route('admin.genres.edit',[$genre->id])  }}">Edit</a>
                        <a onclick="return confirm('آیا مطمئن هستید؟')" href="{{ route('admin.genres.delete',[$genre->id])  }}">Remove</a>
                    </td>

                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5">
                    <span>هیچ اطلاعاتی برای نمایش وجود ندارد.</span>
                </td>
            </tr>
        @endif
    </table>
@endsection