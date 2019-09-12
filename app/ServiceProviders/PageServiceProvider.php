<?php

namespace App\ServiceProviders;

use App\Models\Page;
use App\Services\Pages;
use Illuminate\Support\ServiceProvider;

class PageServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(Pages::class, function ($app) {
            return new Pages(new Page());
        });

        $this->app->when('App\Http\Controllers\Pages')
            ->needs('App\Interfaces\Service')
            ->give(Pages::class);
    }
}
