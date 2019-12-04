<?php

namespace Submtd\LaravelWebhooksClient\Facades;

use Illuminate\Support\Facades\Facade;

class WebhooksClient extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'webhooks-client';
    }
}
