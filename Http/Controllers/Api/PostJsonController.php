<?php

namespace Modules\Post\Http\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Post\Entities\Post;
use Illuminate\Routing\Controller;
use Modules\Post\Transformers\PostResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PostJsonController extends Controller
{
    public function index(Request $request): JsonResource
    {
        return PostResource::collection(
            Post::latest()->paginate($request->query('limit', 10))
        );
    }
}
