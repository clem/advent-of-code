<?php

declare(strict_types=1);

namespace App\UseCase\Year2022\Day01;

use App\UseCase\DayProcessorInterface;

final class Day01Processor implements DayProcessorInterface
{
    public function processPartOne(string $input): int
    {
        $calories = $this->getElvesCalories($input);
        if ($calories === []) {
            return 0;
        }

        return max($calories);
    }

    public function processPartTwo(string $input): int
    {
        $elvesCalories = $this->getElvesCalories($input);

        rsort($elvesCalories);

        return array_sum(array_splice($elvesCalories, 0, 3));
    }

    /**
     * @return int[]
     */
    private function getElvesCalories(string $input): array
    {
        return NumbersGroupMaker::groupNumbers($input);
    }
}
