<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day05;

final class AlmanacMap
{
    public int $source;

    public int $destination;

    public int $range;

    public function __construct(int $source, int $destination, int $range)
    {
        $this->source = $source;
        $this->destination = $destination;
        $this->range = $range;
    }

    public function hasInRange(int $key): bool
    {
        return $key >= $this->destination && $key < $this->destination + $this->range;
    }

    public function getValue(int $key): int
    {
        return $this->source + ($key - $this->destination);
    }
}
