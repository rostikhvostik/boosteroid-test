<?php

namespace App\Http\Controllers;

use App\Http\Requests\SongRequest;
use App\Http\Resources\SongResource;
use App\UseCases\Song\Command as SongCommand;
use App\UseCases\Song\Handler as SongHandler;
use Illuminate\Http\Response;

class SongController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/song",
     *     summary="",
     *     tags={"Song"},
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="duration",
     *         in="query",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="",
     *         @OA\JsonContent(
     *             type="object",
     *             ref="#/components/schemas/SongResource",
     *         ),
     *     ),
     * )
     */
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
