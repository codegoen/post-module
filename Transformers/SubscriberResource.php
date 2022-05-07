<?php

namespace Modules\Post\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class SubscriberResource extends JsonResource
{
    public function toArray($request)
    {
        return array_merge(parent::toArray($request), [
            'subscribe_at' => $this->subscribe_at,
            'unsubscribe_at' => $this->unsubscribe_at,
        ]);
    }
}
