<?php

namespace Modules\Post\Transformers;

use Illuminate\Http\Request;
use Modules\Core\Transformers\UserResource;
use TiMacDonald\JsonApi\JsonApiResource;

class PostResource extends JsonApiResource
{
    protected function toAttributes(Request $request): array
    {
        return [
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    protected function toRelationships(Request $request): array
    {
        return [
            'author' => fn () => UserResource::make($this->author),
            'category' => fn () => CategoryResource::make($this->category),
        ];
    }
}
