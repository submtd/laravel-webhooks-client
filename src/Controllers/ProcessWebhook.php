<?php

namespace Submtd\LaravelWebhooksClient\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Submtd\LaravelWebhooksClient\Events\WebhookEvent;
use Submtd\LaravelWebhooksClient\Models\WebhookEndpoint;

class ProcessWebhook extends Controller
{
    public function __invoke(Request $request, $endpoint)
    {
        $request->validate([
            'trigger' => 'required',
            'payload' => 'required',
            'hash' => 'required',
        ]);
        if (!$webhookEndpoint = WebhookEndpoint::where('endpoint', $endpoint)->first()) {
            return response()->json([
                'result' => 'error',
                'message' => 'Endpoint does not exist',
            ], 404);
        }
        if ($request->get('hash') != md5($request->get('payload') . $webhookEndpoint->encryption_key)) {
            return response()->json([
                'result' => 'error',
                'message' => 'Hash mismatch',
            ], 403);
        }
        event(new WebhookEvent($request->get('trigger'), json_decode($request->get('payload'))));
        return response()->json([
            'result' => 'success',
        ], 200);
    }
}
