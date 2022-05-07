<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Traits\HasUuid;

class Subscriber extends Model
{
    use HasUuid,
        HasFactory;

    protected $table = 'subscribers';

    protected $fillable = [
        'name',
        'email',
        'subscribe_at',
        'unsubscribe_at',
    ];

    protected $casts = [
        'subscribe_at' => 'date',
        'unsubscribe_at' => 'date',
    ];

    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\SubscriberFactory::new();
    }
}
