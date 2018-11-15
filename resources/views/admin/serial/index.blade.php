@extends('layouts.admin')
@section('content')
    <div class="row pr-3 pl-3">
        @include('admin.partials.notifications')
        <table class="table table-striped text-right">
            <thead>
            <tr>
                <th scope="col">شماره</th>
                <th scope="col">عکس</th>
                <th scope="col">نام سریال</th>
                <th scope="col">ژانر</th>
                <th scope="col">تاریخ انتشار</th>
                <th scope="col">عملیات</th>
            </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
            @if($serials && count($serials) > 0)
                @foreach($serials as $serial)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <th scope="row"><img src="{{ $serial->image }}" alt="..." class="img-thumbnail"
                                             style="width:4rem;height:4rem;"></th>
                        <td>{{ $serial->name }}</td>
                        <td>
                            @foreach($serial->genres as $genre)
                                {{ $genre->name }}&nbsp;
                            @endforeach
                        </td>
                        <td>{{ $serial->created_at->todatestring() }}</td>

                        <td>
                            <a href="{{ route('frontend.serials.single' , $serial->slug) }}" class="btn btn-success">مشاهده</a>
                            <a href="{{ route('admin.serials.delete' , $serial->id) }}"
                               onclick="return confirm('آیا مطمئن هستید؟')" class="btn btn-danger  mt-2 mb-2">حذف</a>
                            <a href="{{ route('admin.serials.edit' , $serial->id) }}" class="btn btn-warning ">ویرایش</a>
                            <a href="{{ route('admin.serials.sync_seasons' , $serial->id) }}"
                               class="btn btn-info ">فصل ها</a>
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
        {{ $serials->links() }}


    </div>
@endsection