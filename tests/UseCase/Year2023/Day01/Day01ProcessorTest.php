<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2023\Day01;

use App\UseCase\DayProcessorInterface;
use App\UseCase\Year2023\Day01\Day01Processor;
use PHPUnit\Framework\TestCase;

class Day01ProcessorTest extends TestCase
{
    private DayProcessorInterface $processor;

    public function testProcessPartOne(): void
    {
        $content = <<<EOF
1abc2
pqr3stu8vwx
a1b2c3d4e5f
treb7uchet
EOF;

        $this->assertEquals(142, $this->processor->processPartOne($content));
    }

    public function testProcessPartTwo(): void
    {
        $content = <<<EOF
two1nine
eightwothree
abcone2threexyz
xtwone3four
4nineeightseven2
zoneight234
7pqrstsixteen
EOF;

        $this->assertEquals(281, $this->processor->processPartTwo($content));
    }

    protected function setUp(): void
    {
        $this->processor = new Day01Processor();
    }
}
