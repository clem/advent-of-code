<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2023\Day05;

use App\UseCase\DayProcessorInterface;
use App\UseCase\Year2023\Day05\Day05Processor;
use PHPUnit\Framework\TestCase;

class Day05ProcessorTest extends TestCase
{
    private const string INPUT = <<<EOF
seeds: 79 14 55 13

seed-to-soil map:
50 98 2
52 50 48

soil-to-fertilizer map:
0 15 37
37 52 2
39 0 15

fertilizer-to-water map:
49 53 8
0 11 42
42 0 7
57 7 4

water-to-light map:
88 18 7
18 25 70

light-to-temperature map:
45 77 23
81 45 19
68 64 13

temperature-to-humidity map:
0 69 1
1 0 69

humidity-to-location map:
60 56 37
56 93 4
EOF;

    private DayProcessorInterface $processor;

    public function testProcessPartOne(): void
    {
        $this->assertEquals(
            35,
            $this->processor->processPartOne(self::INPUT)
        );
    }

    public function testProcessPartTwo(): void
    {
        $this->assertEquals(
            46,
            $this->processor->processPartTwo(self::INPUT)
        );
    }

    protected function setUp(): void
    {
        $this->processor = new Day05Processor();
    }
}
