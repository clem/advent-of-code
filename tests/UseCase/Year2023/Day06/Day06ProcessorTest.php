<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2023\Day06;

use App\UseCase\DayProcessorInterface;
use App\UseCase\Year2023\Day06\Day06Processor;
use PHPUnit\Framework\TestCase;

class Day06ProcessorTest extends TestCase
{
    private const string INPUT = <<<EOF
Time:      7  15   30
Distance:  9  40  200
EOF;

    private DayProcessorInterface $processor;

    public function testProcessPartOne(): void
    {
        $this->assertEquals(288, $this->processor->processPartOne(self::INPUT));
    }

    public function testProcessPartTwo(): void
    {
        $this->assertEquals(71503, $this->processor->processPartTwo(self::INPUT));
    }

    protected function setUp(): void
    {
        $this->processor = new Day06Processor();
    }
}
