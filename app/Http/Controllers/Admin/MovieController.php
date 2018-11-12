<?php

namespace App\Http\Controllers\Admin;

use App\Models\Actor;
use App\Models\Country;
use App\Models\Director;
use App\Models\Download_link;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Subtitle;
use App\Models\Writer;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{
    public function index()
    {
//        $movie = Movie::find(1);
//        $sub = new Subtitle();
//        $sub->download_link = "link2";
//        $movie->subtitles()->save($sub);
//        $sub = Subtitle::find(1);
//        $pro = $sub->producible->name;
//        dd($movie->subtitles()->get());
//        dd($pro);
//        $name = str_slug($this->name);

//        $movie = Movie::find(2);
//        $slug = SlugService::createSlug(Movie::class, 'slug', 'دارکوب');
//        $movie->slug = $slug;
//        $movie->save();
//        dd($movie);

        $movies = Movie::paginate(15);
        return view('admin.movie.index' , compact('movies'));

    }

    public function create(Request $request)
    {
        $countries = Country::all();
        $directors = Director::all();
        $actors = Actor::all();
        $writers = Writer::all();
        $genres = Genre::all();
        return view('admin.movie.create' , compact('countries' , 'directors', 'actors','writers' , 'genres'));

    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'rate' => 'required',
            'header_title' => 'required',
            'subheader_title' => 'required',
            'duration' => 'required',
            'language' => 'required',
            'release_year' => 'required',
            'summary' => 'required',
            'meta_keywords' => 'required',
            'image' => 'required',

        ]);

        $imagePath = null;
        if($request->hasFile('image')){

            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $imagePath = DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$imageName;

        }

        $movie_data = [
            'name' => request()->input('name'),
            'rate' => request()->input('rate'),
            'header_title' => request()->input('header_title'),
            'subheader_title' => request()->input('subheader_title'),
            'duration' => request()->input('duration'),
            'language' => request()->input('language'),
            'release_year' => request()->input('release_year'),
            'summary' => request()->input('summary'),
            'meta_keywords' => request()->input('meta_keywords'),
            'image' => $imagePath,

        ];

        $new_movie = Movie::create($movie_data);

        if($new_movie){
            if($request->has('countries')) {

                $countries = $request->input('countries');
                $countryIds = [];

                foreach ($countries as $country){
                    if(is_numeric($country)){
                        $countryIds[] = $country;
                    }
                    else{
                        $new_country = Country::create([
                            'name' => $country
                        ]);
                        $countryIds[] = $new_country->id;
                    }
                }
                $new_movie->countries()->sync($countryIds);
            }
            if($request->has('directors')) {
                $directors = $request->input('directors');
                $directorIds = [];

                foreach ($directors as $director){
                    if(is_numeric($director)){
                        $directorIds[] = $director;
                    }
                    else{
                        $new_director = Director::create([
                            'name' => $director
                        ]);
                        $directorIds[] = $new_director->id;
                    }
                }
                $new_movie->directors()->sync($directorIds);
            }
            if($request->has('actors')) {
                $actors = $request->input('actors');
                $actorIds = [];

                foreach ($actors as $actor){
                    if(is_numeric($actor)){
                        $actorIds[] = $actor;
                    }
                    else{
                        $new_actor = Actor::create([
                            'name' => $actor
                        ]);
                        $actorIds[] = $new_actor->id;
                    }
                }
                $new_movie->actors()->sync($actorIds);
            }
            if($request->has('writers')) {
                $writers = $request->input('writers');
                $writerIds = [];

                foreach ($writers as $writer){
                    if(is_numeric($writer)){
                        $writerIds[] = $writer;
                    }
                    else{
                        $new_writer = Writer::create([
                            'name' => $writer
                        ]);
                        $writerIds[] = $new_writer->id;
                    }
                }
                $new_movie->writers()->sync($writerIds);
            }
            if($request->has('genres')) {
                $new_movie->genres()->sync($request->input('genres'));
            }

            return  redirect()->route('admin.movies.list')->with('success','فیلم جدید با موفقیت ثبت شد');
        }
    }

    public function edit(Request $request , $id)
    {
        $movieItem = Movie::find($id);
        $countries = Country::all();
        $movie_countries = $movieItem->countries()->get()->pluck('id')->toArray();
        $directors = Director::all();
        $movie_directors = $movieItem->directors()->get()->pluck('id')->toArray();
        $actors = Actor::all();
        $movie_actors = $movieItem->actors()->get()->pluck('id')->toArray();
        $writers = Writer::all();
        $movie_writers = $movieItem->writers()->get()->pluck('id')->toArray();
        $genres = Genre::all();
        $movie_genres = $movieItem->genres()->get()->pluck('id')->toArray();
        return view('admin.movie.edit' , compact('movieItem' , 'countries' , 'movie_countries',
            'directors' , 'movie_directors' , 'actors' , 'movie_actors' , 'writers' , 'movie_writers',
            'genres' , 'movie_genres'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'rate' => 'required',
            'header_title' => 'required',
            'subheader_title' => 'required',
            'duration' => 'required',
            'language' => 'required',
            'release_year' => 'required',
            'summary' => 'required',
            'meta_keywords' => 'required',

        ]);


        $movie = Movie::find($id);


        $public_path = public_path();
        $imagePath = null;
        if($request->hasFile('image')){

            $result = File::delete($public_path.$movie->image);


            if ($result){

                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);
                $imagePath = DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.$imageName;


                $updateResult = $movie->update([
                    'name' => request()->input('name'),
                    'rate' => request()->input('rate'),
                    'header_title' => request()->input('header_title'),
                    'subheader_title' => request()->input('subheader_title'),
                    'duration' => request()->input('duration'),
                    'language' => request()->input('language'),
                    'release_year' => request()->input('release_year'),
                    'summary' => request()->input('summary'),
                    'meta_keywords' => request()->input('meta_keywords'),
                    'image' => $imagePath,
                ]);
            }

        }else{
            $updateResult = $movie->update([
                'name' => request()->input('name'),
                'rate' => request()->input('rate'),
                'header_title' => request()->input('header_title'),
                'subheader_title' => request()->input('subheader_title'),
                'duration' => request()->input('duration'),
                'language' => request()->input('language'),
                'release_year' => request()->input('release_year'),
                'summary' => request()->input('summary'),
                'meta_keywords' => request()->input('meta_keywords'),
            ]);
        }






        if($updateResult){

            if($request->has('countries')) {

                $countries = $request->input('countries');
                $countryIds = [];

                foreach ($countries as $country){
                    if(is_numeric($country)){
                        $countryIds[] = $country;
                    }
                    else{
                        $new_country = Country::create([
                            'name' => $country
                        ]);
                        $countryIds[] = $new_country->id;
                    }
                }
                $movie->countries()->sync($countryIds);
            }
            if($request->has('directors')) {
                $directors = $request->input('directors');
                $directorIds = [];

                foreach ($directors as $director){
                    if(is_numeric($director)){
                        $directorIds[] = $director;
                    }
                    else{
                        $new_director = Director::create([
                            'name' => $director
                        ]);
                        $directorIds[] = $new_director->id;
                    }
                }
                $movie->directors()->sync($directorIds);
            }
            if($request->has('actors')) {
                $actors = $request->input('actors');
                $actorIds = [];

                foreach ($actors as $actor){
                    if(is_numeric($actor)){
                        $actorIds[] = $actor;
                    }
                    else{
                        $new_actor = Actor::create([
                            'name' => $actor
                        ]);
                        $actorIds[] = $new_actor->id;
                    }
                }
                $movie->actors()->sync($actorIds);
            }
            if($request->has('writers')) {
                $writers = $request->input('writers');
                $writerIds = [];

                foreach ($writers as $writer){
                    if(is_numeric($writer)){
                        $writerIds[] = $writer;
                    }
                    else{
                        $new_writer = Writer::create([
                            'name' => $writer
                        ]);
                        $writerIds[] = $new_writer->id;
                    }
                }
                $movie->writers()->sync($writerIds);
            }
            if($request->has('genres')) {
                $res = $movie->genres()->sync($request->input('genres'));
            }
            $movie->touch(); // this code updates updated_at
            return redirect()->route('admin.movies.list')->with('success','اطلاعات با موفقیت به روز رسانی شد');

        }




    }

    public function delete(Request $request, $id)
    {
        $movie_id = intval($id);
        $movie = movie::find($movie_id);
        if ($movie) {
            $result = $movie->delete();
            if ($result){
                $movie->countries()->sync([]);
                $movie->directors()->sync([]);
                $movie->actors()->sync([]);
                $movie->writers()->sync([]);
                $movie->genres()->sync([]);
                $movie->download_links()->delete();

                $result = File::delete(public_path().$movie->image);
                if ($result){

                    return redirect()->route('admin.movies.list')->with('success','فیلم مورد نظر با موفقیت حذف گردید.');
                }
            }
        }
    }


    public function syncDownloadLinks(Request $request, $id)
    {
        $movieItem = Movie::find($id);
        $downloadLinks =  $movieItem->download_links()->get();
        $subtitles =  $movieItem->subtitles()->get();

//        dd($downloadLinks);
        return view('admin.movie.syncDownloadLinks' , compact('downloadLinks' , 'subtitles'));
    }

    public function updateSyncDownloadLinks(Request $request, $id)
    {



        $rules = [];


        foreach($request->input('downloadLinksQuality') as $key => $value) {
            $rules["downloadLinksQuality.{$key}"] = 'required';
            $rules["downloadLinksScreen.{$key}"] = 'required';
            $rules["downloadLinks.{$key}"] = 'required';
        }


        foreach($request->input('subtitleDownloadLinks') as $key => $value) {
            $rules["subtitleDownloadLinks.{$key}"] = 'required';
        }

        $request->validate($rules);







        $movie = Movie::find($id);
        $ids = $movie->download_links()->get()->pluck('id')->toArray();
        $idArr=[];
//        dd($request->all());
        $qualities = $request->input('downloadLinksQuality');
        $screens = $request->input('downloadLinksScreen');
        $downloadLinks = $request->input('downloadLinks');

        $counter = 0;
        if ($request->has('download_link_id')){
            foreach ($request->input('download_link_id') as $value){
                $idArr[] = intval($value);
            }

            foreach ($idArr as $value){
                if (in_array($value , $ids)){
                    $dl = Download_link::find($value);
                    $dl->update([
                        'link' => $downloadLinks[$counter],
                        'quality_name' => $qualities[$counter],
                        'screenshot_link' => $screens[$counter],
                    ]);
                    $dl->touch();  // this code updates updated_at
                    $counter++;
                }
            }
            foreach ($ids as $value){
                if (!in_array($value , $idArr)){
                    $dlrm = Download_link::find($value);
                    $dlrm->delete();
                }
            }

        }else{
            $movie->download_links()->delete();
        }
        if ($downloadLinks && $qualities && $screens ){
            for ($i=$counter;$i < count($downloadLinks) ; $i++){
                $download_link = new Download_link();
                $download_link->link = $downloadLinks[$i];
                $download_link->quality_name = $qualities[$i];
                $download_link->screenshot_link	 = $screens[$i];
                $movie->download_links()->save($download_link);
            }
        }



        //--------------- SUBTITLES --------------

        $subtitleIds = $movie->subtitles()->get()->pluck('id')->toArray();
        $subtitleIdArr=[];

        $subtitlesDownloadLinks = $request->input('subtitleDownloadLinks');


        $counter = 0;
        if ($request->has('subtitle_id')){
            foreach ($request->input('subtitle_id') as $value){
                $subtitleIdArr[] = intval($value);
            }

            foreach ($subtitleIdArr as $value){
                if (in_array($value , $subtitleIds)){
                    $sb = Subtitle::find($value);
                    $sb->update([
                        'download_link' => $subtitlesDownloadLinks[$counter]
                    ]);
                    $sb->touch(); // this code updates updated_at
                    $counter++;
                }
            }
            foreach ($subtitleIds as $value){
                if (!in_array($value , $subtitleIdArr)){
                    $sbrm = Subtitle::find($value);
                    $sbrm->delete();
                }
            }

        }else{
            $movie->subtitles()->delete();
        }

        if ($subtitlesDownloadLinks){
            for ($i=$counter;$i < count($subtitlesDownloadLinks) ; $i++){
                $subtitle = new Subtitle();
                $subtitle->download_link = $subtitlesDownloadLinks[$i];
                $movie->subtitles()->save($subtitle);
            }
        }






        return redirect()->route('admin.movies.list')->with('success' , 'عملیات با موفقیت انجام شد.');

    }

}
