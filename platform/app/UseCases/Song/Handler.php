<?php

namespace App\UseCases\Song;

use App\Models\Song;

class Handler
{
    private Song $song;

    public function handle(Command $command): Song
    {
        $this->song = Song::firstOrNew([
            'email' => $command->email,
        ], [
            'last_duration' => $command->duration,
        ]);

        $this->song->total_duration += $command->duration;
        $this->song->last_ip_address = $command->ipAddress;
        $this->song->save();

        return $this->song;
    }
}
