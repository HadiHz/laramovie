@include('admin.partials.errors')

<form class="pt-3 pr-2 text-right" method="post" enctype="multipart/form-data">
    {{ csrf_field()  }}
    <div class="form-group col-md-5 d-inline-block">
        <label for="inputNameFilm" class=" text-dark col-form-label">نام فیلم : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="name" class="form-control" id="inputNameFilm"
                   placeholder="لطفا نام فیلم را وارد کنید ..."
                   value="{{ old('name',isset($movieItem) ? $movieItem->name: '')  }}">
        </div>
    </div>
    <div class="form-group col-md-5 d-inline-block">
        <label for="inputPoint" class="text-dark col-form-label">امتیاز فیلم : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="rate" class="form-control" id="inputPoint"
                   placeholder="لطفا امتیاز فیلم را وارد نمائید "
                   value="{{ old('rate',isset($movieItem) ? $movieItem->rate: '')  }}">
        </div>
    </div>
    <div class="form-group col-md-5 d-inline-block">
        <label for="header_title" class="text-dark col-form-label">عنوان پست : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="header_title" class="form-control" id="header_title"
                   value="{{ old('header_title',isset($movieItem) ? $movieItem->header_title: '')  }}">
        </div>
    </div>
    <div class="form-group col-md-5 d-inline-block">
        <label for="subheader_title" class="text-dark col-form-label">زیر عنوان پست : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="subheader_title" class="form-control" id="subheader_title"
                   value="{{ old('subheader_title',isset($movieItem) ? $movieItem->subheader_title: '')  }}">
        </div>
    </div>
    <div class="form-group">
        <label for="country" class="">محصول کشور : </label>
        <select name="countries[]" class="select2 form-control" id="country" multiple>
            @foreach($countries as $country)
                <option value="{{  $country->id }}" {{ isset($movie_countries) && in_array($country->id , $movie_countries) ? 'selected' : ''  }}>{{ $country->name  }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="director" class="">کارگردان : </label>
        <select name="directors[]" class="select2 form-control" id="director" multiple>
            @foreach($directors as $director)
                <option value="{{  $director->id }}" {{ isset($movie_directors) && in_array($director->id , $movie_directors) ? 'selected' : ''  }}>{{ $director->name  }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="actor" class="">بازیگران : </label>
        <select name="actors[]" class="select2 form-control" id="actor" multiple>
            @foreach($actors as $actor)
                <option value="{{  $actor->id }}" {{ isset($movie_actors) && in_array($actor->id , $movie_actors) ? 'selected' : ''  }}>{{ $actor->name  }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="writers" class="">نویسنده : </label>
        <select name="writers[]" class="select2 form-control" id="writers" multiple>
            @foreach($writers as $writer)
                <option value="{{  $writer->id }}" {{ isset($movie_writers) && in_array($writer->id , $movie_writers) ? 'selected' : ''  }}>{{ $writer->name  }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-5 d-inline-block">
        <label for="inputTime" class="text-dark col-form-label">زمان : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="duration" class="form-control" id="inputTime"
                   value="{{ old('duration',isset($movieItem) ? $movieItem->duration: '')  }}">
        </div>
    </div>
    <div class="form-group col-md-5 d-inline-block">
        <label for="inputLanguage" class="text-dark col-form-label">زبان : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="language" class="form-control" id="inputLanguage"
                   value="{{ old('language',isset($movieItem) ? $movieItem->language: '')  }}">
        </div>
    </div>
    <div class="form-group col-md-5 d-inline-block">
        <label for="inputDate" class="text-dark col-form-label">تاریخ اکران : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="release_year" class="form-control" id="inputDate"
                   value="{{ old('release_year',isset($movieItem) ? $movieItem->release_year: '')  }}">
        </div>
    </div>
    <div class="form-group col-md-8 d-inline-block">
        <div class="col-md-3 d-inline-block">
            <label for="exampleFormControlTextarea1" class="text-dark">خلاصه داستان</label>
        </div>
        <div class="col-md-6 d-inline-block">
            <textarea class="form-control" name="summary" id="exampleFormControlTextarea1" rows="3">
                {{ old('summary',isset($movieItem) ? $movieItem->summary: '')  }}
            </textarea>
        </div>
    </div>

    <div class="form-group col-md-5 d-inline-block">
        <label for="inputQuality" class="text-dark col-form-label">کلمات کلیدی برای سئو : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="meta_keywords" class="form-control" id="inputQuality"
                   value="{{ old('meta_keywords',isset($movieItem) ? $movieItem->meta_keywords: '')  }}">
        </div>
    </div>

    <div class="form-group">
        <label for="genres" class="">ژانر : </label>
        <select name="genres[]" class="select2 no_tag form-control" id="genres" multiple>
            @foreach($genres as $genre)
                <option value="{{  $genre->id }}" {{ isset($movie_genres) && in_array($genre->id , $movie_genres) ? 'selected' : ''  }}>{{ $genre->name  }}</option>
            @endforeach
        </select>
    </div>
    <div class="custom-file col-md-8 mb-3 ">

        <input type="file" name="image" class="custom-file-input" id="customFile">
        <label class="custom-file-label text-center mb-3" for="customFile">انتخاب تصویر شاخص</label>

    </div>
    <div class="form-group mt-3">
        <label for="preview">پیش نمایش تصویر</label>

        <img class="img-thumbnail" id="preview" src="{{ isset($movieItem) ? $movieItem->image: '' }}" alt="">
    </div>


    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">منتشر کردن فیلم</button>
        </div>
    </div>
</form>