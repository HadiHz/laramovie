<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'layouts.frontend',
            'App\Http\ViewComposers\GenreComposer'
        );

        view()->composer(
            'layouts.frontend',
            'App\Http\ViewComposers\MovieComposer'
        );

        view()->composer(
            'layouts.frontend',
            'App\Http\ViewComposers\SerialComposer'
        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
