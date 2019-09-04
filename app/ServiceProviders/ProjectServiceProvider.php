<?php

namespace App\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use App\Services\Projects;
use App\Models\Project;

class ProjectServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(Projects::class, function ($app) {
            return new Projects(new Project());
        });
    }


}
