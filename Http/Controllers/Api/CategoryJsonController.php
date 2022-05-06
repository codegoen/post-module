<?php

namespace Modules\Post\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Post\Entities\Category;
use Modules\Post\Http\Requests\CategoryRequest;
use Modules\Post\Transformers\CategoryResource;

class CategoryJsonController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/v1/category",
     *      operationId="indexCategory",
     *      tags={"category"},
     *      summary="Index Category",
     *      description="Returns list of Category",
     *      @OA\Response(response=200, description="Successful operation"),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=401, description="Unauthorized"),
     *      @OA\Response(response=402, description="Payment Required"),
     * )
     */
    public function index(Request $request)
    {
        return CategoryResource::collection(
            Category::query()->whereLike('name', $request->query('q'))->latest()->paginate($request->query('limit', 10))
        );
    }

    public function show(Category $category)
    {
        return CategoryResource::make($category);
    }

    public function store(CategoryRequest $request)
    {
        //
    }
}
