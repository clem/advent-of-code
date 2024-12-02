<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day03;

abstract class AbstractGearInfo
{
    public readonly int $posY;

    public readonly int $posX;

    public function __construct(int $posY, int $posX)
    {
        $this->posY = $posY;
        $this->posX = $posX;
    }
}
