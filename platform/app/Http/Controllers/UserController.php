<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\UseCases\User\Command as UserCommand;
use App\UseCases\User\Handler as UserHandler;

class UserController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/users",
     *     summary="",
     *     tags={"Users"},
     *     @OA\Parameter(
     *         name="operator",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="string", nullable=true, enum={"<", "=", ">"})
     *     ),
     *     @OA\Parameter(
     *         name="total_duration",
     *         in="query",
     *         required=false,
     *         @OA\Schema(type="integer", nullable=true)
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="",
     *         @OA\JsonContent(
     *             type="object",
     *             ref="#/components/schemas/UserResourceCollection",
     *         ),
     *     ),
     * )
     */
    public function __invoke(UserRequest $request, UserHandler $handler)
    {
        return UserResource::collection(
            $handler->handle(
                new UserCommand(
                    $request->operator,
                    $request->total_duration
                )
            )
        );
    }
}
