<?php
/**
 * Created by PhpStorm.
 * User: Hadi
 * Date: 11/18/2018
 * Time: 12:42 AM
 */

namespace App\Http\ViewComposers;


use App\Models\Genre;
use Illuminate\View\View;

class GenreComposer
{

    public $genres;


    public function __construct()
    {
        $this->genres = Genre::all();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('genres', $this->genres);
    }

}