<?php

namespace Modules\Post\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Category;
use Modules\Post\Transformers\CategoryResource;
use TiMacDonald\JsonApi\JsonApiResourceCollection;

class CategoryJsonController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/categories",
     *      operationId="readAllCategory",
     *      tags={"Category"},
     *      summary="List of Category",
     *      description="Returns list of Category",
     *      @OA\Parameter(
     *          name="include",
     *          required=false,
     *          in="query",
     *          example="author",
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
    public function index(Request $request): JsonApiResourceCollection
    {
        return CategoryResource::collection(
            Category::query()->whereLike('name', $request->query('q'))->latest()->paginate($request->query('limit', 10))
        );
    }

    /**
     * @OA\Get(
     *      path="/api/v1/categories/{id}?include=posts",
     *      operationId="readCategoryById",
     *      tags={"Category"},
     *      summary="Get Category based on id",
     *      description="Returns Category based on id",
     *      @OA\Parameter(
     *          name="id",
     *          required=true,
     *          in="path",
     *          example="f6f16655-588b-49c5-b620-d2791a6c925c",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="include",
     *          required=false,
     *          in="query",
     *          example="posts",
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
    public function show(Category $category): CategoryResource
    {
        return CategoryResource::make($category);
    }
}
