<?php
declare(strict_types=1);

namespace App\UseCase\Year2024\Day02;

use App\UseCase\DayProcessorInterface;

final class Day02Processor implements DayProcessorInterface
{
    public function processPartOne(string $input): int
    {
        $reports = ReportExtractor::extract($input);

        $validReports = array_filter($reports, [ReportAnalyser::class, 'isReportSafe']);

        return count($validReports);
    }

    public function processPartTwo(string $input): int
    {
        $reports = ReportExtractor::extract($input);

        $validReports = 0;

        foreach ($reports as $report) {
            if (ReportAnalyser::isReportSafe($report)) {
                $validReports++;

                continue;
            }

            $levels = ReportAnalyser::getReportLevels($report);

            foreach ($levels as $index => $level) {
                $fixedReport = implode(
                    ' ',
                    ReportAnalyser::getReportLevelsWithoutIndex($report, $index)
                );

                if (ReportAnalyser::isReportSafe($fixedReport)) {
                    $validReports++;

                    break;
                }
            }
        }

        return $validReports;
    }
}
