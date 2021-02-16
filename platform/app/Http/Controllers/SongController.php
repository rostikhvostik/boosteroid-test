<?php

namespace App\Http\Controllers;

use App\Http\Requests\SongRequest;
use App\Http\Resources\SongResource;
use App\UseCases\Song\Command as SongCommand;
use App\UseCases\Song\Handler as SongHandler;
use Illuminate\Http\Response;

class SongController extends Controller
{
    public function __invoke(SongRequest $request, SongHandler $handler)
    {
        $song = $handler->handle(
            new SongCommand(
                $request->email,
                (int) $request->duration,
                $request->ip(),
            )
        );

        return (new SongResource($song))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }
}
