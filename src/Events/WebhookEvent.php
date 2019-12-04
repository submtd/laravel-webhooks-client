<?php

namespace Submtd\LaravelWebhooksClient\Events;

class WebhookEvent
{
    /**
     * Trigger
     * @var string $trigger
     */
    public $trigger;

    /**
     * Payload
     * @var object $payload
     */
    public $payload;

    /**
     * Class constructor
     * @param string $trigger
     * @param object $payload
     */
    public function __construct(string $trigger, object $payload)
    {
        $this->trigger = $trigger;
        $this->payload = $payload;
    }
}
