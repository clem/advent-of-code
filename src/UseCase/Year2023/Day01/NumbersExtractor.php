<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day01;

final class NumbersExtractor
{
    public static function extractFirstAndLastNumbersFromString(string $input): int
    {
        if (empty($input)) {
            return 0;
        }

        $numbers = filter_var($input, FILTER_SANITIZE_NUMBER_INT);
        if ($numbers === false) {
            return 0;
        }

        return self::getStringFirstCharacterNumber($numbers) + self::getStringLastCharacterNumber($numbers);
    }

    private static function getStringFirstCharacterNumber(string $numbers): int
    {
        return (int) substr($numbers, 0, 1) * 10;
    }

    private static function getStringLastCharacterNumber(string $numbers): int
    {
        return (int) substr($numbers, -1);
    }
}
