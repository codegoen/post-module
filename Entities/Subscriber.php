<?php

namespace Modules\Post\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Core\Entities\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscriber extends Model
{
    use HasUuid,
        HasFactory;

    protected $guarded = [
        'name',
        'email',
    ];

    protected static function newFactory()
    {
        return \Modules\Post\Database\factories\SubscriberFactory::new();
    }
}
