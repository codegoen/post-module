<?php

namespace Modules\Post\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;
use Modules\Post\Actions\SubscribeAction;
use Modules\Post\Http\Requests\SubscribeEmailRequest;
use Modules\Post\Http\Requests\SubscriberRequest;
use Modules\Post\Transformers\SubscriberResource;

class SubscribeJsonController extends Controller
{
    /**
     * @OA\Examples(
     *      example="Subscribe",
     *      summary="Subscribe",
     *      value={
     *          "name": "John Doe",
     *          "email": "johndoe@mail.com"
     *      }
     * )
     *
     * @OA\Post(
     *      path="/api/v1/subscribe",
     *      operationId="subscribeNewsLatter",
     *      tags={"Subscribe"},
     *      summary="Subscribe news latter",
     *      description="Subscribe news latter",
     *      @OA\RequestBody(
     *          required=true,
     *          description="Description",
     *          @OA\JsonContent(
     *              examples={
     *                  "first": @OA\Schema(ref="#/components/examples/Subscribe", example="Subscribe")
     *              }
     *          )
     *      ),
     *      @OA\Response(response=200, description="Successful operation"),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=401, description="Unauthorized"),
     *      @OA\Response(response=402, description="Payment Required"),
     * )
     */
    public function subscribe(SubscriberRequest $request): SubscriberResource
    {
        return SubscriberResource::make(
            SubscribeAction::subscribe($request->validated())
        );
    }

    public function validate(SubscribeEmailRequest $request): JsonResponse
    {
        SubscribeAction::validate($request->email);

        return response()->json([
            'success' => true,
            'message' => 'Successfully subscribe news latter',
        ]);
    }

    public function unsubscribe(SubscribeEmailRequest $request): JsonResponse
    {
        SubscribeAction::unsubscribe($request->email);

        return response()->json([
            'success' => true,
            'message' => 'Successfully unsubscribe news latter',
        ]);
    }
}
