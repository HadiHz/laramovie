@extends('layouts.admin')
@section('content')
    @include('admin.partials.errors')
    @include('admin.partials.notifications')
    <div class="row pr-3 pl-3">

        <button id="add_episode" type="button" class="btn btn-primary ml-3">اضافه کردن قسمت</button>

        <div class="form-group col-md-12 d-inline-block">
            <div class="row mb-3 mt-3 pr-3 pl-3">

                <?php $name = $serial->name;
                $image = $serial->image;
                $season_number = $season->season_number;
                ?>
                <script>
                    var serialNameFromblade = @json($name);
                    var serialImageFromblade = @json($image);
                    var seasonNumberFromblade = @json($season_number);
                </script>
                <form method="post">
                    {{ csrf_field() }}
                    <table class="table table-striped text-right">
                        <thead>
                        <tr>
                            <th scope="col">عکس</th>
                            <th scope="col">نام سریال</th>
                            <th scope="col">فصل</th>
                            <th scope="col">قسمت</th>
                            <th scope="col">نام قسمت</th>

                            <th scope="col">تاریخ انتشار</th>
                            <th scope="col">عملیات</th>
                        </tr>
                        </thead>
                        <tbody class="episode-wrapper">
                        @foreach($episodes as $episode)
                            <tr>
                                <th scope="row"><img src="{{ $serial->image }}" alt="..." class="img-thumbnail"
                                                     style="width:4rem;height:4rem;"></th>
                                <td>{{ $serial->name }}</td>
                                <td>{{ $season->season_number }}</td>
                                <td><input name="episode_number[]" type="text" value="{{ $episode->episode_number }}"></td>
                                <td><input name="name[]" type="text" value="{{ $episode->name }}"></td>
                                <td><input name="release_date[]" type="text" data-field="date" value="{{ $episode->release_date->format('d-m-Y') }}"></td>
                                <td>
                                    <button type="button" class="btn btn-danger mt-2 mb-2 remove_episode">حذف</button>
                                    <a href="{{ route('admin.serials.sync_episode_download' , ['serial_id' => $serial->id, 'season_id' => $season->id , 'episode_id' => $episode->id]) }}" class="btn btn-info">لینک های دانلود</a>
                                    <input type="hidden" name="season_id[]" value="{{ $episode->id }}">

                                </td>
                            </tr>

                        @endforeach

                        </tbody>
                    </table>

                    <div id="dtBox"></div>

                    <div class="row mt-5 float-left ml-4">
                        <button type="submit" class="btn btn-success">ذخیره اطلاعات</button>
                    </div>
                </form>


            </div>

        </div>
    </div>
@endsection