@extends('layouts.admin')
@section('content')
    @include('admin.partials.errors')
    @include('admin.partials.notifications')
    <div class="row pr-3 pl-3">

        <button id="add_season" type="button" class="btn btn-primary ml-3">اضافه کردن فصل</button>

        <div class="form-group col-md-12 d-inline-block">
            <div class="row mb-3 mt-3 pr-3 pl-3">

                <?php $name = $serial->name;
                $image = $serial->image;
                ?>
                <script>
                    var serialNameFromblade = @json($name);
                    var serialImageFromblade = @json($image);
                </script>
                <form method="post">
                    {{ csrf_field() }}
                    <table class="table table-striped text-right">
                        <thead>
                        <tr>
                            <th scope="col">عکس</th>
                            <th scope="col">نام سریال</th>
                            <th scope="col">شماره فصل</th>
                            <th scope="col">تعداد قسمت ها</th>

                            <th scope="col">تاریخ انتشار</th>
                            <th scope="col">عملیات</th>
                        </tr>
                        </thead>
                        <tbody class="season-wrapper">
                        @foreach($seasons as $season)
                            <tr>
                                <th scope="row"><img src="{{ $serial->image }}" alt="..." class="img-thumbnail"
                                                     style="width:4rem;height:4rem;"></th>
                                <td>{{ $serial->name }}</td>
                                <td><input name="season_number[]" type="text" value="{{ $season->season_number }}"></td>
                                <td><input name="number_of_episodes[]" type="text" value="{{ $season->number_of_episodes }}"></td>
                                <td> {{ $season->created_at->todatestring() }} </td>
                                <td>
                                    <button type="button" class="btn btn-danger mt-2 mb-2 remove_season">حذف</button>
                                    <a href="{{ route('admin.serials.sync_episodes' , ['serial_id' => $serial->id, 'season_id' => $season->id]) }}" class="btn btn-info">قسمت ها</a>
                                    <input type="hidden" name="season_id[]" value="{{ $season->id }}">

                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>


                    <div class="row mt-5 float-left ml-4">
                        <button type="submit" class="btn btn-success">ذخیره اطلاعات</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
@endsection