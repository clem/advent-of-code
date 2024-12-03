<?php
declare(strict_types=1);

namespace App\UseCase\Year2024\Day02;

final class ReportExtractor
{
    /**
     * @return array<int, string>
     */
    public static function extract(string $input): array
    {
        $reports = explode(PHP_EOL, $input);

        return array_values(array_filter($reports));
    }
}
