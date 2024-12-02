<?php

declare(strict_types=1);

namespace App\UseCase\Year2024\Day01;

use App\UseCase\DayProcessorInterface;

final class Day01Processor implements DayProcessorInterface
{
    public function processPartOne(string $input): int
    {
        $columns = ColumnsExtractor::extract($input);

        return DistanceCalculator::calculate($columns['left'], $columns['right']);
    }

    public function processPartTwo(string $input): int
    {
        $columns = ColumnsExtractor::extract($input);

        return SimilarityCalculator::calculate($columns['left'], $columns['right']);
    }
}
