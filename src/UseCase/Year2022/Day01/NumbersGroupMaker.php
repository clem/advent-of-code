<?php

declare(strict_types=1);

namespace App\UseCase\Year2022\Day01;

final class NumbersGroupMaker
{
    /**
     * @return array<int, int>
     */
    public static function groupNumbers(string $numbersInput, string $groupSeparator = "\n\n"): array
    {
        if ($groupSeparator === '') {
            return [];
        }

        return array_map(
            static fn (string $elfCalories) => array_sum(
                array_map('intval', explode("\n", $elfCalories))
            ),
            explode($groupSeparator, $numbersInput)
        );
    }
}
