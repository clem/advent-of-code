<?php

declare(strict_types=1);

namespace App\UseCase\Year2024\Day01;

final class SimilarityCalculator
{
    /**
     * @param array<int, int> $left
     * @param array<int, int> $right
     */
    public static function calculate(array $left, array $right): int
    {
        $totalLines = count($left);
        $rightValues = array_count_values($right);

        $similarity = 0;

        for ($index = 0; $index < $totalLines; $index++) {
            $number = $left[$index];

            $similarity += ($number * ($rightValues[$number] ?? 0));
        }

        return $similarity;
    }
}
