<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2024\Day01;

use App\UseCase\Year2024\Day01\Day01Processor;
use PHPUnit\Framework\TestCase;

class Day01ProcessorTest extends TestCase
{
    public function testProcessPartOne(): void
    {
        $input = <<<EOL
3   4
4   3
2   5
1   3
3   9
3   3
EOL;

        $processor = new Day01Processor();
        $this->assertEquals(11, $processor->processPartOne($input));
    }

    public function testProcessPartTwo(): void
    {

    }
}
