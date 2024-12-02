<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day06;

final class ToyBoatRace
{
    public int $time;

    public int $distance;

    public function __construct(int $time, int $distance)
    {
        $this->time = $time;
        $this->distance = $distance;
    }
}
