<?php

namespace App\UseCases\User;

/**
 * Class Command
 * @package App\UseCases\User
 * @property string $operator
 * @property int $duration
 */
class Command
{
    public string $operator;
    public int $duration;

    public function __construct(
        string $operator,
        int $duration
    ) {
        $this->operator = $operator;
        $this->duration = $duration;
    }
}
