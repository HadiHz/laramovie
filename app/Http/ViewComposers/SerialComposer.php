<?php
/**
 * Created by PhpStorm.
 * User: Hadi
 * Date: 11/18/2018
 * Time: 1:14 PM
 */

namespace App\Http\ViewComposers;

use App\Models\Serial;
use Illuminate\View\View;

class SerialComposer
{

    public $latestSerials;

    public function __construct()
    {
        $this->latestSerials = Serial::orderBy('updated_at', 'DESC')->take(10)->get();
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('latestSerials', $this->latestSerials);
    }

}