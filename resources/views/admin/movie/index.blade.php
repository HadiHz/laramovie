@extends('layouts.admin')
@section('content')
    <div class="row pr-3 pl-3">
        @include('admin.partials.notifications')
        <table class="table table-striped text-right">
            <thead>
            <tr>
                <th scope="col">شماره</th>
                <th scope="col">عکس</th>
                <th scope="col">نام فیلم</th>
                <th scope="col">ژانر</th>
                <th scope="col">تاریخ انتشار</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @if($movies && count($movies) > 0)
                @foreach($movies as $movie)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <th scope="row"><img src="{{ $movie->image }}" alt="..." class="img-thumbnail"
                                             style="width:4rem;height:4rem;"></th>
                        <td>{{ $movie->name }}</td>
                        <td>
                        @foreach($movie->genres as $genre)
                            {{ $genre->name }}،
                        @endforeach
                        </td>
                        <td>{{ $movie->release_year }}</td>

                        <td>
                            <a href="{{ route('frontend.movies.single' , $movie->slug) }}" class="btn btn-success">مشاهده</a>
                            <a href="{{ route('admin.movies.delete' , $movie->id) }}"
                               onclick="return confirm('آیا مطمئن هستید؟')" class="btn btn-danger  mt-2 mb-2">حذف</a>
                            <a href="{{ route('admin.movies.edit' , $movie->id) }}" class="btn btn-warning ">ویرایش</a>
                            <a href="{{ route('admin.movies.sync_download_links' , $movie->id) }}"
                               class="btn btn-info ">لینک های دانلود</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">
                        <span>هیچ اطلاعاتی برای نمایش وجود ندارد.</span>
                    </td>
                </tr>
            @endif


            </tbody>
        </table>
        {{ $movies->links() }}


    </div>
@endsection