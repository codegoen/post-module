<?php

namespace Modules\Post\Http\Controllers\Api;

use Illuminate\Http\Request;
use Modules\Core\Abstracts\CoreController;
use Modules\Post\Entities\Category;
use Spatie\QueryBuilder\QueryBuilder;
use Modules\Post\Http\Requests\CategoryRequest;
use Modules\Post\Transformers\CategoryResource;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryJsonController extends CoreController
{
    /**
     * @OA\Get(
     *      path="/api/v1/categories",
     *      operationId="readAllCategory",
     *      tags={"Category"},
     *      summary="List of Category",
     *      description="Returns list of Category",
     *      @OA\Parameter(
     *          name="filter[name]",
     *          required=false,
     *          in="query",
     *          example="laravel",
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
    public function index(Request $request): AnonymousResourceCollection
    {
        $categories = QueryBuilder::for(Category::class)->allowedFilters(['name', 'author.username'])
            ->allowedSorts(['name', 'posts_count'])->withCount('posts')->latest()
            ->paginate($request->query('limit', 10));

        return CategoryResource::collection($categories);
    }

    public function store(CategoryRequest $request)
    {
        $category = Category::create($request->validated());

        return CategoryResource::make($category);
    }

    /**
     * @OA\Get(
     *      path="/api/v1/categories/{id}",
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
