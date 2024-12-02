<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day01;

use App\UseCase\DayProcessorInterface;

final class Day01Processor implements DayProcessorInterface
{
    public function processPartOne(string $input): int
    {
        return $this->processPart(
            $input,
            [NumbersExtractor::class, 'extractFirstAndLastNumbersFromString']
        );
    }

    public function processPartTwo(string $input): int
    {
        return $this->processPart(
            $input,
            [$this, 'extractConvertedNumbersFromInput']
        );
    }

    private function processPart(string $input, callable $extractor): int
    {
        return array_sum(
            array_map(
                $extractor,
                explode("\n", $input)
            )
        );
    }

    private function extractConvertedNumbersFromInput(string $input): int
    {
        return NumbersExtractor::extractFirstAndLastNumbersFromString(
            SpelledOutConverter::convertSpelledOutNumbers($input)
        );
    }
}
