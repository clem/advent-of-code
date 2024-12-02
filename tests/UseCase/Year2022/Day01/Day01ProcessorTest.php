<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2022\Day01;

use App\UseCase\DayProcessorInterface;
use App\UseCase\Year2022\Day01\Day01Processor;
use PHPUnit\Framework\TestCase;

class Day01ProcessorTest extends TestCase
{
    private DayProcessorInterface $processor;

    private const string SAMPLE_INPUT = <<<EOF
1000
2000
3000

4000

5000
6000

7000
8000
9000

10000
EOF;

    public function testProcessPartOne(): void
    {
        $this->assertEquals(24000, $this->processor->processPartOne(self::SAMPLE_INPUT));
    }

    public function testProcessPartTwo(): void
    {
        $this->assertEquals(45000, $this->processor->processPartTwo(self::SAMPLE_INPUT));
    }

    protected function setUp(): void
    {
        $this->processor = new Day01Processor();
    }
}
