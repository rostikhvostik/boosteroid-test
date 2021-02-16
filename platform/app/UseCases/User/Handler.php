<?php

namespace App\UseCases\User;

use App\Models\Song;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class Handler
{
    public function handle(Command $command): LengthAwarePaginator
    {
        return Song::when(($command->operator && $command->totalDuration), function ($query) use ($command) {
            return $query->where('total_duration', $command->operator, $command->totalDuration);
        })->paginate();
    }
}
