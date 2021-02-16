<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\UseCases\User\Command as UserCommand;
use App\UseCases\User\Handler as UserHandler;

class UserController extends Controller
{
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
