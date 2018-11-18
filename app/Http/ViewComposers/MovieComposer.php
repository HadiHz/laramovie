<?php
/**
 * Created by PhpStorm.
 * User: Hadi
 * Date: 11/18/2018
 * Time: 12:59 PM
 */

namespace App\Http\ViewComposers;


use App\Models\Movie;
use Illuminate\View\View;

class MovieComposer
{
    public $latestMovies;


    public function __construct()
    {
        $this->latestMovies = Movie::orderBy('updated_at', 'DESC')->take(10)->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('latestMovies', $this->latestMovies);
    }
}