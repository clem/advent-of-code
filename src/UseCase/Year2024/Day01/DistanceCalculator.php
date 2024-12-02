<?php

declare(strict_types=1);

namespace App\UseCase\Year2024\Day01;

final class DistanceCalculator
{
    /**
     * @param array<int, int> $left
     * @param array<int, int> $right
     */
    public static function calculate(array $left, array $right): int
    {
        $totalLines = count($left);
        $distance = 0;

        for ($index = 0; $index < $totalLines; $index++) {
            $distance += abs($left[$index] - $right[$index]);
        }

        return $distance;
    }
}
