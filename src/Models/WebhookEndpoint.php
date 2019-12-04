<?php

namespace Submtd\LaravelWebhooksClient\Models;

use Dyrynda\Database\Support\GeneratesUuid;
use Illuminate\Database\Eloquent\Model;
use Submtd\LaravelEncryptedFields\HasEncryptedFields;

class WebhookEndpoint extends Model
{
    use GeneratesUuid, HasEncryptedFields;

    /**
     * Fillable attributes
     * @var array $fillable
     */
    protected $fillable = [
        'endpoint',
        'encryption_key',
    ];

    /**
     * Encrypted attributes
     * @var array $encrypt
     */
    public static $encrypt = [
        'encryption_key',
    ];

    /**
     * Hidden attributes
     * @var array $hidden
     */
    protected $hidden = [
        'encryption_key',
    ];
}
