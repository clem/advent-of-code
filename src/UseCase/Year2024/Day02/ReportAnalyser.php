<?php
declare(strict_types=1);

namespace App\UseCase\Year2024\Day02;

final class ReportAnalyser
{
    public static function isReportSafe(string $report): bool
    {
        $levels = self::getReportLevels($report);

        $previousNumber = null;
        $direction = null;

        foreach ($levels as $level) {
            $currentNumber = (int) $level;

            if ($previousNumber === null) {
                $previousNumber = $currentNumber;
                continue;
            }

            if ($previousNumber === $currentNumber) {
                return false;
            }

            if (!self::isDistanceValid($previousNumber, $currentNumber)) {
                return false;
            }

            if ($direction === null) {
                $direction = $previousNumber < $currentNumber ? 'up' : 'down';
            }

            if (($direction === 'up' && $previousNumber > $currentNumber)
            || ($direction === 'down' && $previousNumber < $currentNumber)) {
                return false;
            }

            $previousNumber = $currentNumber;
        }

        return true;
    }

    public static function isDistanceValid(int $leftNumber, int $rightNumber): bool
    {
        $distance = abs($leftNumber - $rightNumber);

        return $distance >= 1 && $distance <= 3;
    }

    /**
     * @return array<int, string>
     */
    public static function getReportLevels(string $report): array
    {
        return explode(' ', $report);
    }

    /**
     * @return array<int, string>
     */
    public static function getReportLevelsWithoutIndex(string $report, int $index): array
    {
        $levels = self::getReportLevels($report);

        unset($levels[$index]);

        return array_values($levels);
    }
}
