<?php

namespace Modules\Post\Events;

use Illuminate\Queue\SerializesModels;

class SendSubscribeNewsLatter
{
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(
        protected array $data
    ) {
        //
    }
}
