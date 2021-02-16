<?php

namespace App\UseCases\Song;

/**
 * Class Command
 * @package App\UseCases\Song
 * @property string $email
 * @property int $duration
 * @property string $ipAddress
 */
class Command
{
    public string $email;
    public string $duration;
    public string $ipAddress;

    public function __construct(
        string $email,
        string $duration,
        string $ipAddress
    ) {
        $this->email = $email;
        $this->duration = $duration;
        $this->ipAddress = $ipAddress;
    }
}
