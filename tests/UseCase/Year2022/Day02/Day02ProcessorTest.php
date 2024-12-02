<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2022\Day02;

use App\UseCase\DayProcessorInterface;
use App\UseCase\Year2022\Day02\Day02Processor;
use PHPUnit\Framework\TestCase;

class Day02ProcessorTest extends TestCase
{
    private DayProcessorInterface $processor;

    public function testProcessPartTwo(): void
    {
        $input = <<<EOF
A Y
B X
C Z
EOF;

        $this->assertEquals(15, $this->processor->processPartOne($input));
    }

    public function testProcessPartOne(): void
    {

        $input = <<<EOF
A Y
B X
C Z
EOF;

        $this->assertEquals(12, $this->processor->processPartTwo($input));
    }

    protected function setUp(): void
    {
        $this->processor = new Day02Processor();
    }
}
