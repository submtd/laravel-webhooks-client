<?php

namespace Submtd\LaravelWebhooksClient\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Submtd\LaravelWebhooksClient\Models\WebhookEndpoint;

class AddEndpoint extends Command
{
    /**
     * Command signature
     * @var string $signature
     */
    protected $signature = 'webhooks:add-endpoint';

    /**
     * Command description
     * @var string $description
     */
    protected $description = 'Add a new webhooks endpoint.';

    /**
     * Handle
     */
    public function handle()
    {
        $endpoint = Str::kebab($this->ask('Enter the endpoint'));
        if (WebhookEndpoint::where('endpoint', $endpoint)->count()) {
            $this->error('Endpoint already exists');
            return false;
        }
        $encryption_key = $this->secret('Enter the encryption key');
        if ($encryption_key != $this->secret('Confirm the encryption key')) {
            $this->error('Encryption keys do not match');
            return false;
        }
        $this->info('Endpoint URL will be ' . url('webhooks/' . $endpoint));
        if (!$this->confirm('Is this correct?')) {
            $this->error('Endpoint not created');
            return false;
        }
        WebhookEndpoint::create([
            'endpoint' => $endpoint,
            'encryption_key' => $encryption_key,
        ]);
        $this->info('Endpoint created');
    }
}
