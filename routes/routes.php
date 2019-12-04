<?php

Route::group([
    'namespace' => 'Submtd\LaravelWebhooksClient\Controllers',
], function () {
    Route::post('webhooks/{endpoint}', 'ProcessWebhook');
});
