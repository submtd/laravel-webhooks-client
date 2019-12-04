<?php

if (!function_exists('webhooks_client')) {
    function webhooks_client() : Submtd\LaravelWebhooksClient\Services\WebhooksClientService
    {
        return new Submtd\LaravelWebhooksClient\Services\WebhooksClientService();
    }
}
