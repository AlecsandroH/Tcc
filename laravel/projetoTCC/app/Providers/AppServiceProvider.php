<?php

namespace App\Providers;

use App\Services\PostService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(PostService::class, function () {
            return new PostService();
        });
    }
}
