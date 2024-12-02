<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day01;

final class SpelledOutConverter
{
    public static function convertSpelledOutNumbers(string $input): string
    {
        if (empty($input)) {
            return '';
        }

        // Added first and last character to handle overlapping numbers
        return str_replace(
            ['one', 'two', 'three', 'four', 'five', 'six', 'seven', 'eight', 'nine'],
            ['o1e', 't2o', 't3e', 'f4r', 'f5e', 's6x', 's7n', 'e8t', 'n9e'],
            $input
        );
    }
}
