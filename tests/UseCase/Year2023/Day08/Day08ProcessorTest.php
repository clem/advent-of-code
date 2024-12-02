<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2023\Day08;

use App\UseCase\DayProcessorInterface;
use App\UseCase\Year2023\Day08\Day08Processor;
use PHPUnit\Framework\TestCase;

class Day08ProcessorTest extends TestCase
{
    private DayProcessorInterface $processor;

    public function testProcessPartOne(): void
    {
        $input = <<<EOF
RL

AAA = (BBB, CCC)
BBB = (DDD, EEE)
CCC = (ZZZ, GGG)
DDD = (DDD, DDD)
EEE = (EEE, EEE)
GGG = (GGG, GGG)
ZZZ = (ZZZ, ZZZ)
EOF;

        $this->assertEquals(2, $this->processor->processPartOne($input));

        $input = <<<EOF
LLR

AAA = (BBB, BBB)
BBB = (AAA, ZZZ)
ZZZ = (ZZZ, ZZZ)
EOF;

        $this->assertEquals(6, $this->processor->processPartOne($input));
    }

    public function testProcessPartTwo(): void
    {
        $input = <<<EOF
LR

11A = (11B, XXX)
11B = (XXX, 11Z)
11Z = (11B, XXX)
22A = (22B, XXX)
22B = (22C, 22C)
22C = (22Z, 22Z)
22Z = (22B, 22B)
XXX = (XXX, XXX)
EOF;

        $this->assertEquals(6, $this->processor->processPartTwo($input));
    }

    protected function setUp(): void
    {
        $this->processor = new Day08Processor();
    }
}
