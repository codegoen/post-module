<?php

namespace Modules\Post\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Post;
use Modules\Post\Transformers\PostResource;

class PostJsonController extends Controller
{
    public function index(Request $request): JsonResource
    {
        return PostResource::collection(
            Post::latest()->paginate($request->query('limit', 10))
        );
    }
}
