<?php

namespace Modules\Post\Transformers;

use Illuminate\Http\Request;
use TiMacDonald\JsonApi\JsonApiResource;
use Modules\Post\Transformers\PostResource;
use Modules\User\Transformers\UserResource;

class CategoryResource extends JsonApiResource
{
    protected function toAttributes(Request $request): array
    {
        return [
            'name' => $this->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

    protected function toRelationships(Request $request): array
    {
        return [
            'posts' => fn () => PostResource::collection($this->posts),
            'author' => fn () => UserResource::make($this->author),
        ];
    }
}
