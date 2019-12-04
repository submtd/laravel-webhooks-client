<?php

namespace Submtd\LaravelWebhooksClient\Providers;

use Illuminate\Support\ServiceProvider;
use Submtd\LaravelWebhooksClient\Commands\AddEndpoint;
use Submtd\LaravelWebhooksClient\Services\WebhooksClientService;

class WebhooksClientServiceProvider extends ServiceProvider
{
    /**
     * register method
     */
    public function register()
    {
        $this->app->bind('webhooks-client', function () {
            return new WebhooksClientService();
        });
        $this->commands([
            AddEndpoint::class,
        ]);
    }

    /**
     * boot method
     */
    public function boot()
    {
        // config
        $this->mergeConfigFrom(__DIR__ . '/../../config/webhooks-client.php', 'webhooks-client');
        $this->publishes([__DIR__ . '/../../config' => config_path()], 'config');
        // migrations
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        $this->publishes([__DIR__ . '/../../database' => database_path()], 'migrations');
        // routes
        $this->loadRoutesFrom(__DIR__ . '/../../routes/routes.php');
    }
}
