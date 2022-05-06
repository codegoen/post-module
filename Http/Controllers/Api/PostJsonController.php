<?php

namespace Modules\Post\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Routing\Controller;
use Modules\Post\Actions\PostAction;
use Modules\Post\Entities\Post;
use Modules\Post\Http\Requests\PostRequest;
use Modules\Post\Transformers\PostResource;

class PostJsonController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/post",
     *      operationId="indexPost",
     *      tags={"post"},
     *      summary="Index Post",
     *      description="Returns list of Post",
     *      @OA\Response(response=200, description="Successful operation"),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=401, description="Unauthorized"),
     *      @OA\Response(response=402, description="Payment Required"),
     * )
     */
    public function index(Request $request): JsonResource
    {
        return PostResource::collection(
            Post::latest()->whereLike(['title', 'category.name'], $request->query('q'))->paginate($request->query('limit', 10))
        );
    }

    public function store(PostRequest $request): JsonResource
    {
        $post = PostAction::create($request);

        return new PostResource($post);
    }

    public function show(Post $post): JsonResource
    {
        return new PostResource($post);
    }
}
