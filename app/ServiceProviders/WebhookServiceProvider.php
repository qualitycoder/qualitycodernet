<?php

namespace App\Providers\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use App\Services\Webhooks;
use App\Models\Project;
use App\Models\Webhook;

class WebhookServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(Webhooks::class, function ($app) {
            return new Webhooks(new Webhook(), new Project());
        });
    }


}
