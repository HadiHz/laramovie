<?php

namespace App\Http\Controllers\Admin;

use App\Models\Actor;
use App\Models\Country;
use App\Models\Director;
use App\Models\Download_link;
use App\Models\Episode;
use App\Models\Genre;
use App\Models\Season;
use App\Models\Serial;
use App\Models\Subtitle;
use App\Models\Writer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\DocBlock;

class SerialController extends Controller
{
    public function index()
    {
        $serials = Serial::orderBy('updated_at', 'DESC')->paginate(15);
        return view('admin.serial.index', compact('serials'));
    }

    public function create(Request $request)
    {
        $countries = Country::all();
        $directors = Director::all();
        $actors = Actor::all();
        $writers = Writer::all();
        $genres = Genre::all();
        return view('admin.serial.create', compact('countries', 'directors', 'actors', 'writers', 'genres'));


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
            'release_date' => 'required',
            'summary' => 'required',
            'meta_keywords' => 'required',
            'image' => 'required',
            'number_of_seasons' => 'required',

        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('images'), $imageName);
            $imagePath = DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $imageName;

        }

        $serial_data = [
            'name' => request()->input('name'),
            'rate' => request()->input('rate'),
            'header_title' => request()->input('header_title'),
            'subheader_title' => request()->input('subheader_title'),
            'duration' => request()->input('duration'),
            'language' => request()->input('language'),
            'release_date' => Carbon::createFromFormat('Y-m-d', request()->input('release_date')),
            'summary' => request()->input('summary'),
            'meta_keywords' => request()->input('meta_keywords'),
            'image' => $imagePath,
            'number_of_seasons' => request()->input('number_of_seasons')

        ];

        $new_serial = Serial::create($serial_data);

        if ($new_serial) {
            if ($request->has('countries')) {

                $countries = $request->input('countries');
                $countryIds = [];

                foreach ($countries as $country) {
                    if (is_numeric($country)) {
                        $countryIds[] = $country;
                    } else {
                        $new_country = Country::create([
                            'name' => $country
                        ]);
                        $countryIds[] = $new_country->id;
                    }
                }
                $new_serial->countries()->sync($countryIds);
            }
            if ($request->has('directors')) {
                $directors = $request->input('directors');
                $directorIds = [];

                foreach ($directors as $director) {
                    if (is_numeric($director)) {
                        $directorIds[] = $director;
                    } else {
                        $new_director = Director::create([
                            'name' => $director
                        ]);
                        $directorIds[] = $new_director->id;
                    }
                }
                $new_serial->directors()->sync($directorIds);
            }
            if ($request->has('actors')) {
                $actors = $request->input('actors');
                $actorIds = [];

                foreach ($actors as $actor) {
                    if (is_numeric($actor)) {
                        $actorIds[] = $actor;
                    } else {
                        $new_actor = Actor::create([
                            'name' => $actor
                        ]);
                        $actorIds[] = $new_actor->id;
                    }
                }
                $new_serial->actors()->sync($actorIds);
            }
            if ($request->has('writers')) {
                $writers = $request->input('writers');
                $writerIds = [];

                foreach ($writers as $writer) {
                    if (is_numeric($writer)) {
                        $writerIds[] = $writer;
                    } else {
                        $new_writer = Writer::create([
                            'name' => $writer
                        ]);
                        $writerIds[] = $new_writer->id;
                    }
                }
                $new_serial->writers()->sync($writerIds);
            }
            if ($request->has('genres')) {
                $new_serial->genres()->sync($request->input('genres'));
            }

            return redirect()->route('admin.serials.list')->with('success', 'سریال جدید با موفقیت ثبت شد');
        }

    }

    public function edit(Request $request , $id)
    {


        $serialItem = Serial::find($id);
        $countries = Country::all();
        $movie_countries = $serialItem->countries()->get()->pluck('id')->toArray();
        $directors = Director::all();
        $movie_directors = $serialItem->directors()->get()->pluck('id')->toArray();
        $actors = Actor::all();
        $movie_actors = $serialItem->actors()->get()->pluck('id')->toArray();
        $writers = Writer::all();
        $movie_writers = $serialItem->writers()->get()->pluck('id')->toArray();
        $genres = Genre::all();
        $movie_genres = $serialItem->genres()->get()->pluck('id')->toArray();
        return view('admin.serial.edit', compact('serialItem', 'countries', 'movie_countries',
            'directors', 'movie_directors', 'actors', 'movie_actors', 'writers', 'movie_writers',
            'genres', 'movie_genres'));

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
            'release_date' => 'required',
            'summary' => 'required',
            'meta_keywords' => 'required',
            'number_of_seasons' => 'required',

        ]);


        $serial = Serial::find($id);


        $public_path = public_path();
        $imagePath = null;
        if ($request->hasFile('image')) {

            $result = File::delete($public_path . $serial->image);


            if ($result) {

                $imageName = time() . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);
                $imagePath = DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $imageName;


                $updateResult = $serial->update([
                    'name' => request()->input('name'),
                    'rate' => request()->input('rate'),
                    'header_title' => request()->input('header_title'),
                    'subheader_title' => request()->input('subheader_title'),
                    'duration' => request()->input('duration'),
                    'language' => request()->input('language'),
                    'release_date' => Carbon::createFromFormat('Y-m-d', request()->input('release_date')),
                    'summary' => request()->input('summary'),
                    'meta_keywords' => request()->input('meta_keywords'),
                    'image' => $imagePath,
                    'number_of_seasons' => request()->input('number_of_seasons')
                ]);
            }

        } else {
            $updateResult = $serial->update([
                'name' => request()->input('name'),
                'rate' => request()->input('rate'),
                'header_title' => request()->input('header_title'),
                'subheader_title' => request()->input('subheader_title'),
                'duration' => request()->input('duration'),
                'language' => request()->input('language'),
                'release_date' => Carbon::createFromFormat('Y-m-d', request()->input('release_date')),
                'summary' => request()->input('summary'),
                'meta_keywords' => request()->input('meta_keywords'),
                'number_of_seasons' => request()->input('number_of_seasons')
            ]);
        }


        if ($updateResult) {

            if ($request->has('countries')) {

                $countries = $request->input('countries');
                $countryIds = [];

                foreach ($countries as $country) {
                    if (is_numeric($country)) {
                        $countryIds[] = $country;
                    } else {
                        $new_country = Country::create([
                            'name' => $country
                        ]);
                        $countryIds[] = $new_country->id;
                    }
                }
                $serial->countries()->sync($countryIds);
            }
            if ($request->has('directors')) {
                $directors = $request->input('directors');
                $directorIds = [];

                foreach ($directors as $director) {
                    if (is_numeric($director)) {
                        $directorIds[] = $director;
                    } else {
                        $new_director = Director::create([
                            'name' => $director
                        ]);
                        $directorIds[] = $new_director->id;
                    }
                }
                $serial->directors()->sync($directorIds);
            }
            if ($request->has('actors')) {
                $actors = $request->input('actors');
                $actorIds = [];

                foreach ($actors as $actor) {
                    if (is_numeric($actor)) {
                        $actorIds[] = $actor;
                    } else {
                        $new_actor = Actor::create([
                            'name' => $actor
                        ]);
                        $actorIds[] = $new_actor->id;
                    }
                }
                $serial->actors()->sync($actorIds);
            }
            if ($request->has('writers')) {
                $writers = $request->input('writers');
                $writerIds = [];

                foreach ($writers as $writer) {
                    if (is_numeric($writer)) {
                        $writerIds[] = $writer;
                    } else {
                        $new_writer = Writer::create([
                            'name' => $writer
                        ]);
                        $writerIds[] = $new_writer->id;
                    }
                }
                $serial->writers()->sync($writerIds);
            }
            if ($request->has('genres')) {
                $res = $serial->genres()->sync($request->input('genres'));
            }
            $serial->touch(); // this code updates updated_at
            return redirect()->route('admin.serials.list')->with('success', 'اطلاعات با موفقیت به روز رسانی شد');

        }





    }

    public function delete(Request $request, $id)
    {

        $serial_id = intval($id);
        $serial = Serial::find($serial_id);
        if ($serial) {
            $result = $serial->delete();
            if ($result) {
                $serial->countries()->sync([]);
                $serial->directors()->sync([]);
                $serial->actors()->sync([]);
                $serial->writers()->sync([]);
                $serial->genres()->sync([]);
                $seasons = $serial->seasons()->get();
                foreach ($seasons as $season){
                    $episodes = $season->episodes()->get();
                    foreach ($episodes as $episode){
                        $episode->download_links()->delete();
                        $episode->subtitles()->delete();
                    }
                    $season->episodes()->delete();
                }
                $serial->seasons()->delete();

                $result = File::delete(public_path() . $serial->image);
                if ($result) {

                    return redirect()->route('admin.serials.list')->with('success', 'سریال مورد نظر با موفقیت حذف گردید.');
                }
            }
        }

    }


    public function syncSeasons(Request $request, $serial_id)
    {
        $serial = Serial::find($serial_id);
        $seasons = $serial->seasons()->get();
        return view('admin.serial.syncSeasons' , compact('serial' , 'seasons'));
    }

    public function updateSyncSeasons(Request $request, $serial_id)
    {



        $rules = [];


        if ($request->has('season_number')) {

            foreach ($request->input('season_number') as $key => $value) {
                $rules["season_number.{$key}"] = 'required';
                $rules["number_of_episodes.{$key}"] = 'required';
            }
        }


        $request->validate($rules);


        $serial = Serial::find($serial_id);
        $ids = $serial->seasons()->get()->pluck('id')->toArray();
        $idArr = [];
//        dd($request->all());
        $season_number = $request->input('season_number');
        $number_of_episodes = $request->input('number_of_episodes');

        $counter = 0;
        if ($request->has('season_id')) {
            foreach ($request->input('season_id') as $value) {
                $idArr[] = intval($value);
            }

            foreach ($idArr as $value) {
                if (in_array($value, $ids)) {
                    $se = Season::find($value);
                    $se->update([
                        'serial_id' => $serial_id,
                        'season_number' => $season_number[$counter],
                        'number_of_episodes' => $number_of_episodes[$counter],
                    ]);
                    $se->touch();  // this code updates updated_at
                    $counter++;
                }
            }
            foreach ($ids as $value) {
                if (!in_array($value, $idArr)) {
                    $serm = Season::find($value);
                    $serm->delete();
                }
            }

        } else {
            $serial->seasons()->delete();
        }
        if ($season_number && $number_of_episodes ) {
            for ($i = $counter; $i < count($number_of_episodes); $i++) {
                $season = new Season();
                $season->serial_id = $serial_id;
                $season->season_number = $season_number[$i];
                $season->number_of_episodes = $number_of_episodes[$i];
                $serial->seasons()->save($season);
            }
        }




        return redirect()->route('admin.serials.sync_seasons',['serial_id' => $serial_id])->with('success', 'عملیات با موفقیت انجام شد.');

    }


    public function syncEpisodes(Request $request, $serial_id, $season_id)
    {

        $serial = Serial::find($serial_id);
        $season = Season::find($season_id);
        $episodes = $season->episodes()->get();
        return view('admin.serial.syncEpisodes' , compact('serial' , 'season' , 'episodes'));

    }


    public function updateSyncEpisodes(Request $request, $serial_id, $season_id)
    {



        $rules = [];


        if ($request->has('episode_number')) {

            foreach ($request->input('episode_number') as $key => $value) {
                $rules["episode_number.{$key}"] = 'required';
                $rules["name.{$key}"] = 'required';
                $rules["release_date.{$key}"] = 'required';
            }
        }


        $request->validate($rules);


        $season = Season::find($season_id);
        $ids = $season->episodes()->get()->pluck('id')->toArray();
        $idArr = [];
//        dd($request->all());
        $episode_number = $request->input('episode_number');
        $name = $request->input('name');
        $release_date = $request->input('release_date');

        $counter = 0;
        if ($request->has('episode_id')) {
            foreach ($request->input('episode_id') as $value) {
                $idArr[] = intval($value);
            }

            foreach ($idArr as $value) {
                if (in_array($value, $ids)) {
                    $ep = Episode::find($value);
                    $ep->update([
                        'season_id' => $season_id,
                        'episode_number' => $episode_number[$counter],
                        'name' => $name[$counter],
                        'release_date' => Carbon::createFromFormat('Y-m-d', $release_date[$counter]),
                    ]);
                    $ep->touch();  // this code updates updated_at
                    $counter++;
                }
            }
            foreach ($ids as $value) {
                if (!in_array($value, $idArr)) {
                    $eprm = Episode::find($value);
                    $eprm->delete();
                }
            }

        } else {
            $season->episodes()->delete();
        }
        if ($episode_number && $name && $release_date ) {
            for ($i = $counter; $i < count($episode_number); $i++) {
                $episode = new Episode();
                $episode->season_id = $season_id;
                $episode->episode_number = $episode_number[$i];
                $episode->name = $name[$i];
                $episode->release_date = Carbon::createFromFormat('Y-m-d', $release_date[$counter]);
                $season->episodes()->save($episode);
            }
        }


        $season->release_date = $season->episodes()->first()->release_date;
        $season->save();




        return redirect()->route('admin.serials.sync_episodes' ,
            ['serial_id' => $serial_id, 'season_id' => $season_id])->with('success', 'عملیات با موفقیت انجام شد.');




    }


    public function syncDonloadLinksForEpisode(Request $request, $serial_id, $season_id, $episode_id)
    {
        $serial = Serial::find($serial_id);
        $season = Season::find($season_id);
        $episode = Episode::find($episode_id);
        $download_links = $episode->download_links()->get();
        $subtitles = $episode->subtitles()->get();
        return view('admin.serial.syncEpisodeDownloadLInks' , compact('serial','season',
            'episode','download_links','subtitles'));
    }


    public function updateSyncDonloadLinksForEpisode(Request $request, $serial_id, $season_id, $episode_id)
    {



        $rules = [];


        if ($request->has('downloadLinksQuality')) {

            foreach ($request->input('downloadLinksQuality') as $key => $value) {
                $rules["downloadLinksQuality.{$key}"] = 'required';
                $rules["downloadLinksScreen.{$key}"] = 'required';
                $rules["downloadLinks.{$key}"] = 'required';
            }
        }

        if ($request->has('subtitleDownloadLinks')) {

            foreach ($request->input('subtitleDownloadLinks') as $key => $value) {
                $rules["subtitleDownloadLinks.{$key}"] = 'required';
            }
        }

        $request->validate($rules);


        $episode = Episode::find($episode_id);
        $ids = $episode->download_links()->get()->pluck('id')->toArray();
        $idArr = [];
//        dd($request->all());
        $qualities = $request->input('downloadLinksQuality');
        $screens = $request->input('downloadLinksScreen');
        $downloadLinks = $request->input('downloadLinks');

        $counter = 0;
        if ($request->has('download_link_id')) {
            foreach ($request->input('download_link_id') as $value) {
                $idArr[] = intval($value);
            }

            foreach ($idArr as $value) {
                if (in_array($value, $ids)) {
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
            foreach ($ids as $value) {
                if (!in_array($value, $idArr)) {
                    $dlrm = Download_link::find($value);
                    $dlrm->delete();
                }
            }

        } else {
            $episode->download_links()->delete();
        }
        if ($downloadLinks && $qualities && $screens) {
            for ($i = $counter; $i < count($downloadLinks); $i++) {
                $download_link = new Download_link();
                $download_link->link = $downloadLinks[$i];
                $download_link->quality_name = $qualities[$i];
                $download_link->screenshot_link = $screens[$i];
                $episode->download_links()->save($download_link);
            }
        }


        //--------------- SUBTITLES --------------

        $subtitleIds = $episode->subtitles()->get()->pluck('id')->toArray();
        $subtitleIdArr = [];

        $subtitlesDownloadLinks = $request->input('subtitleDownloadLinks');


        $counter = 0;
        if ($request->has('subtitle_id')) {
            foreach ($request->input('subtitle_id') as $value) {
                $subtitleIdArr[] = intval($value);
            }

            foreach ($subtitleIdArr as $value) {
                if (in_array($value, $subtitleIds)) {
                    $sb = Subtitle::find($value);
                    $sb->update([
                        'download_link' => $subtitlesDownloadLinks[$counter]
                    ]);
                    $sb->touch(); // this code updates updated_at
                    $counter++;
                }
            }
            foreach ($subtitleIds as $value) {
                if (!in_array($value, $subtitleIdArr)) {
                    $sbrm = Subtitle::find($value);
                    $sbrm->delete();
                }
            }

        } else {
            $episode->subtitles()->delete();
        }
        if ($subtitlesDownloadLinks) {
            for ($i = $counter; $i < count($subtitlesDownloadLinks); $i++) {
                $subtitle = new Subtitle();
                $subtitle->download_link = $subtitlesDownloadLinks[$i];
                $episode->subtitles()->save($subtitle);
            }
        }


        return redirect()->route('admin.serials.list')->with('success', 'عملیات با موفقیت انجام شد.');




    }


    
    
}