<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Twitter;


class SocialServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // dd("register social");
          $this->app->singleton(Twitter::class, function () {
            return new Twitter('api-key');
        });

        // $this->app->singleton(Twitter::class, function () {
        //     return new Twitter('api-key');
        // });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
