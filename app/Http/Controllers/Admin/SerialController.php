<?php

namespace App\Http\Controllers\Admin;

use App\Models\Actor;
use App\Models\Country;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Serial;
use App\Models\Writer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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

    }
}
