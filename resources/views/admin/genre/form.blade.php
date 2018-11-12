<div class="row">

    <div class="col-xs-12 col-md-6">
        @include('admin.partials.errors')
        <form action="" method="post">
            {{ csrf_field()  }}
            <div class="form-group">
                <label for="name">عنوان ژانر  :</label>
                <input class="form-control" name="name" id="name"
                       value="{{ old('name',isset($genreItem) ? $genreItem->name: '')  }}">
            </div>
            <div class="form-group">
                <label for="meta_keywords">کلمات کلیدی  :</label>
                <input class="form-control" name="meta_keywords" id="meta_keywords"
                       value="{{ old('meta_keywords',isset($genreItem) ? $genreItem->meta_keywords: '')  }}">
            </div>
            <div class="form-group">
                <label for="meta_description">دیسکریپشن  :</label>
                <input class="form-control" name="meta_description" id="meta_description"
                       value="{{ old('meta_description',isset($genreItem) ? $genreItem->meta_description: '')  }}">
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">ذخیره اطلاعات</button>
            </div>
        </form>
    </div>
</div>