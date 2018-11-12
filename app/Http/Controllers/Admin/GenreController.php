<?php

namespace App\Http\Controllers\Admin;

use App\Models\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('admin.genre.index' , compact('genres'));
    }

    public function create(Request $request)
    {
        return view('admin.genre.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
        ]);

        $new_genre= Genre::create([
            'name' => $request->input('name'),
            'meta_keywords' => $request->input('meta_keywords'),
            'meta_description' => $request->input('meta_description'),
        ]);
        if($new_genre){
            return redirect()->route('admin.genres.list')->with('success','ژانر جدید با موفقیت ایجاد شد.');
        }
    }

    public function edit(Request $request , $id)
    {
        $genreItem = Genre::find($id);
        return view('admin.genre.edit',compact('genreItem'));

    }

    public function update(Request $request, $id)
    {
        $genreItem = Genre::find($id);
        $updateResult = $genreItem->update([
            'name' => $request->input('name'),
            'meta_keywords' => $request->input('meta_keywords'),
            'meta_description' => $request->input('meta_description'),
        ]);
        $genreItem->touch(); // this updates updated_at
        if($updateResult){
            return redirect()->route('admin.genres.list')->with('success','اطلاعات با موفقیت به روز رسانی شد');

        }
    }

    public function delete(Request $request, $id)
    {
        $genreItem = Genre::find($id);


        $result = $genreItem->delete();

        if ($result){
            $genreItem->movies()->sync([]);
            $genreItem->serials()->sync([]);
            return redirect()->route('admin.genres.list')->with('success','عملیات با موفقیت انجام شد.');
        }


    }
}
