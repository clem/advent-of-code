<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2023\Day02;

use App\UseCase\DayProcessorInterface;
use App\UseCase\Year2023\Day02\Day02Processor;
use PHPUnit\Framework\TestCase;

class Day02ProcessorTest extends TestCase
{
    private DayProcessorInterface $processor;

    private const string INPUT = <<<EOF
Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green
Game 2: 1 blue, 2 green; 3 green, 4 blue, 1 red; 1 green, 1 blue
Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red
Game 4: 1 green, 3 red, 6 blue; 3 green, 6 red; 3 green, 15 blue, 14 red
Game 5: 6 red, 1 blue, 3 green; 2 blue, 1 red, 2 green
EOF;


    public function testProcessPartOne(): void
    {
        $this->assertEquals(8, $this->processor->processPartOne(self::INPUT));
    }

    public function testProcessPartTwo(): void
    {
        $this->assertEquals(2286, $this->processor->processPartTwo(self::INPUT));
    }

    protected function setUp(): void
    {
        $this->processor = new Day02Processor();
    }
}
