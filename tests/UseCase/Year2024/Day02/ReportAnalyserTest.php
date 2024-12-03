<?php
declare(strict_types=1);

namespace App\Tests\UseCase\Year2024\Day02;

use App\UseCase\Year2024\Day02\ReportAnalyser;
use PHPUnit\Framework\TestCase;

class ReportAnalyserTest extends TestCase
{
    /**
     * @dataProvider getReportsProvider
     */
    public function testIsReportSafe(string $report, bool $expected): void
    {
        $this->assertEquals($expected, ReportAnalyser::isReportSafe($report));
    }

    /**
     * @return iterable<array{0: string, 1: bool}>
     */
    public static function getReportsProvider(): iterable
    {
        yield ['7 6 4 2 1', true];
        yield ['1 2 7 8 9', false];
        yield ['9 7 6 2 1', false];
        yield ['1 3 2 4 5', false];
        yield ['8 6 4 4 1', false];
        yield ['1 3 6 7 9', true];
    }

    /**
     * @dataProvider getDistanceProvider
     */
    public function testIsDistanceValid(int $leftNumber, int $rightNumber, bool $expected): void
    {
        $this->assertEquals(
            $expected,
            ReportAnalyser::isDistanceValid($leftNumber, $rightNumber)
        );
    }

    /**
     * @return iterable<array{0: int, 1: int, 2: bool}>
     */
    public static function getDistanceProvider(): iterable
    {
        yield [1, 2, true];
        yield [5, 2, true];
        yield [2, 7, false];
        yield [2, 2, false];
    }

    /**
     * @dataProvider getReportLevelsProvider
     * @param array{0: string, 1: array<int, string>} $expected
     */
    public function testGetReportLevels(string $report, array $expected): void
    {
        $this->assertEquals(
            $expected,
            ReportAnalyser::getReportLevels($report)
        );
    }

    /**
     * @return iterable<array{0: string, 1: array<int, string>}>
     */
    public static function getReportLevelsProvider(): iterable
    {
        yield ['7 6 4 2 1', ['7', '6', '4', '2', '1']];
        yield ['1 2 7 8 9', ['1', '2', '7', '8', '9']];
        yield ['9 7 6 2 1', ['9', '7', '6', '2', '1']];
        yield ['1 3 2 4 5', ['1', '3', '2', '4', '5']];
        yield ['8 6 4 4 1', ['8', '6', '4', '4', '1']];
        yield ['1 3 6 7 9', ['1', '3', '6', '7', '9']];
    }

    /**
     * @dataProvider getReportLevelsWithoutIndexProvider
     * @param array{0: string, 1: int, 2: array<int, string>} $expected
     */
    public function testGetReportLevelsWithoutIndex(string $report, int $index, array $expected): void
    {
        $this->assertEquals(
            $expected,
            ReportAnalyser::getReportLevelsWithoutIndex($report, $index)
        );
    }

    /**
     * @return iterable<array{0: string, 1: int, 2: array<int, string>}>
     */
    public static function getReportLevelsWithoutIndexProvider(): iterable
    {
        yield ['7 6 4 2 1', 2, ['7', '6', '2', '1']];
        yield ['1 2 7 8 9', 3, ['1', '2', '7', '9']];
        yield ['9 7 6 2 1', 0, ['7', '6', '2', '1']];
        yield ['1 3 2 4 5', 4, ['1', '3', '2', '4']];
        yield ['8 6 4 4 1', 1, ['8', '4', '4', '1']];
        yield ['1 3 6 7 9', 2, ['1', '3', '7', '9']];
    }
}
