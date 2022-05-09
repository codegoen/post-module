<?php

namespace Modules\Post\Transformers;

use Modules\Post\Entities\Post;
use Modules\Core\Transformers\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'author' => UserResource::make($this->author)
        ];
    }
}
