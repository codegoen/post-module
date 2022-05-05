<?php

namespace Modules\Post\Transformers;

use Modules\User\Entities\User;
use Modules\User\Transformers\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'author' => new UserResource(User::find($this->created_by)),
        ];
    }
}
