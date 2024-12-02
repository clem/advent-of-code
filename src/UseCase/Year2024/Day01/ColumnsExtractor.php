<?php

declare(strict_types=1);

namespace App\UseCase\Year2024\Day01;

final class ColumnsExtractor
{
    /**
     * @return array{left: array<int, int>, right: array<int, int>}
     */
    public static function extract(string $input): array
    {
        preg_match_all('/(\d+)\s+(\d+)/', $input, $lines);

        return [
            'left' => self::sortNumeric($lines[1]),
            'right' => self::sortNumeric($lines[2]),
        ];
    }

    /**
     * @param array<int, string|int> $array
     * @return array<int, int>
     */
    private static function sortNumeric(array $array): array
    {
        $array = array_map('intval', $array);

        sort($array, SORT_NUMERIC);

        return $array;
    }
}
