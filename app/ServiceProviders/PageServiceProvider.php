<?php

namespace App\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use App\Services\Pages;
use App\Models\Page;

class PageServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(Pages::class, function ($app) {
            return new Pages(new Page());
        });
    }


}
