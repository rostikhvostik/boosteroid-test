<?php

namespace App\UseCases\User;

/**
 * Class Command
 * @package App\UseCases\User
 * @property string|null $operator
 * @property int|null $totalDuration
 */
class Command
{
    public ?string $operator;
    public ?int $totalDuration;

    public function __construct(
        ?string $operator,
        ?int $totalDuration
    ) {
        $this->operator = $operator;
        $this->totalDuration = $totalDuration;
    }
}
