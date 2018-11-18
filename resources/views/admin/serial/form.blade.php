@include('admin.partials.errors')

<form class="pt-3 pr-2 text-right" method="post" enctype="multipart/form-data">
    {{ csrf_field()  }}
    <div class="form-group col-md-5 d-inline-block">
        <label for="inputNameFilm" class=" text-dark col-form-label">نام سریال : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="name" class="form-control" id="inputNameFilm"
                   placeholder="لطفا نام سریال را وارد کنید ..."
                   value="{{ old('name',isset($serialItem) ? $serialItem->name: '')  }}">
        </div>
    </div>
    <div class="form-group col-md-5 d-inline-block">
        <label for="inputPoint" class="text-dark col-form-label">امتیاز سریال : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="rate" class="form-control" id="inputPoint"
                   placeholder="لطفا امتیاز سریال را وارد نمائید "
                   value="{{ old('rate',isset($serialItem) ? $serialItem->rate: '')  }}">
        </div>
    </div>
    <div class="form-group col-md-5 d-inline-block">
        <label for="header_title" class="text-dark col-form-label">عنوان پست : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="header_title" class="form-control" id="header_title"
                   value="{{ old('header_title',isset($serialItem) ? $serialItem->header_title: '')  }}">
        </div>
    </div>
    <div class="form-group col-md-5 d-inline-block">
        <label for="subheader_title" class="text-dark col-form-label">زیر عنوان پست : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="subheader_title" class="form-control" id="subheader_title"
                   value="{{ old('subheader_title',isset($serialItem) ? $serialItem->subheader_title: '')  }}">
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
                   value="{{ old('duration',isset($serialItem) ? $serialItem->duration: '')  }}">
        </div>
    </div>
    <div class="form-group col-md-5 d-inline-block">
        <label for="inputLanguage" class="text-dark col-form-label">زبان : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="language" class="form-control" id="inputLanguage"
                   value="{{ old('language',isset($serialItem) ? $serialItem->language: '')  }}">
        </div>
    </div>
    <div class="form-group col-md-5 d-inline-block">
        <label for="release_date" class="text-dark col-form-label">تاریخ اکران : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="release_date" class="form-control" id="release_date"
                   value="{{ old('release_date',isset($serialItem) ? $serialItem->release_date->todatestring() : '')  }}">
        </div>
    </div>
    <div class="form-group col-md-5 d-inline-block">
        <label for="number_of_seasons" class="text-dark col-form-label">تعداد فصل ها : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="number_of_seasons" class="form-control" id="number_of_seasons"
                   value="{{ old('number_of_seasons',isset($serialItem) ? $serialItem->number_of_seasons: '')  }}">
        </div>
    </div>
    <div class="form-group col-md-8 d-inline-block">
        <div class="col-md-3 d-inline-block">
            <label for="exampleFormControlTextarea1" class="text-dark">خلاصه داستان</label>
        </div>
        <div class="col-md-6 d-inline-block">
            <textarea class="form-control" name="summary" id="exampleFormControlTextarea1" rows="3">
                {{ old('summary',isset($serialItem) ? $serialItem->summary: '')  }}
            </textarea>
        </div>
    </div>

    <div class="form-group col-md-5 d-inline-block">
        <label for="inputQuality" class="text-dark col-form-label">کلمات کلیدی برای سئو : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="meta_keywords" class="form-control" id="inputQuality"
                   value="{{ old('meta_keywords',isset($serialItem) ? $serialItem->meta_keywords: '')  }}">
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

    <div class="form-group col-md-5 d-inline-block">
        <label for="image_alt" class="text-dark col-form-label">صفت  alt برای تصویر : </label>
        <div class="col-md-6 d-inline-block">
            <input type="text" name="image_alt" class="form-control" id="image_alt"
                   value="{{ old('image_alt',isset($serialItem) ? $serialItem->image_alt: '')  }}">
        </div>
    </div>

    <div class="form-group mt-3">
        <label for="preview">پیش نمایش تصویر</label>

        <img class="img-thumbnail" id="preview" src="{{ isset($serialItem) ? $serialItem->image: '' }}" alt="">
    </div>


    <div class="form-group row">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">منتشر کردن سریال</button>
        </div>
    </div>
</form>