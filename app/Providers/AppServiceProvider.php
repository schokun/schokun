<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;

use Illuminate\Support\ServiceProvider;
use App\Observers\UserObserver;
use App\Observers\PostObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        User::observe(UserObserver::class);
        Post::observe(PostObserver::class);
    }
}
