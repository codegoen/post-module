<?php

namespace Modules\Post\Actions;

use Illuminate\Support\Facades\DB;
use Modules\Post\Entities\Subscriber;
use Modules\Post\Events\SendSubscribeNewsLatter;

class SubscribeAction
{
    public static function subscribe(array $data): Subscriber
    {
        return DB::transaction(function () use ($data) {
            event(new SendSubscribeNewsLatter($data));

            return Subscriber::create($data);
        });
    }

    public static function validate(string $email): void
    {
        DB::transaction(function () use ($email) {
            Subscriber::whereEmail($email)->update([
                'subscribe_at' => now(),
            ]);
        });
    }

    public static function unsubscribe(string $email): void
    {
        DB::transaction(function () use ($email) {
            Subscriber::whereEmail($email)->update([
                'unsubscribe_at' => now(),
            ]);
        });
    }
}
