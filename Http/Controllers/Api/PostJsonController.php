<?php

namespace Modules\Post\Http\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Core\Abstracts\CoreController;
use Modules\Post\Entities\Post;
use Modules\Post\Transformers\PostResource;
use TiMacDonald\JsonApi\JsonApiResourceCollection;

class PostJsonController extends CoreController
{
    /**
     * @OA\Get(
     *      path="/api/v1/posts",
     *      operationId="readAllPost",
     *      tags={"Post"},
     *      summary="List of Post",
     *      description="Returns list of Post",
     *      @OA\Response(response=200, description="Successful operation"),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=401, description="Unauthorized"),
     *      @OA\Response(response=402, description="Payment Required"),
     * )
     */
    public function index(Request $request): JsonApiResourceCollection
    {
        return PostResource::collection(
            Post::latest()->whereLike(['title', 'category.name'], $request->query('q'))->paginate($request->query('limit', 10))
        );
    }

    /**
     * @OA\Get(
     *      path="/api/v1/posts/{id}",
     *      operationId="readPostById",
     *      tags={"Post"},
     *      summary="Get Post based on id",
     *      description="Returns Post based on id",
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          example="7fe911d0-0473-4b47-8fb3-97dccbd47e19",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(response=200, description="Successful operation"),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=401, description="Unauthorized"),
     *      @OA\Response(response=402, description="Payment Required"),
     * )
     */
    public function show(Post $post): PostResource
    {
        return PostResource::make($post);
    }
}
