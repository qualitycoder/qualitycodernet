<?php

namespace App\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use App\Services\Webhooks;
use App\Models\Project;
use App\Models\Webhook;

class WebhookServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bind(Webhooks::class, function ($app) {
            $webhook = new Webhooks(new Webhook());
            $webhook->setProjectModel(new Project());
            return $webhook;
        });

        $this->app->when('App\Http\Controllers\Webhooks')
            ->needs('App\Interfaces\Service')
            ->give(Webhooks::class);
    }


}
