<?php
declare(strict_types=1);

namespace App\Tests\UseCase\Year2024\Day02;

use App\UseCase\Year2024\Day02\Day02Processor;
use PHPUnit\Framework\TestCase;

class Day02ProcessorTest extends TestCase
{

    public function testProcessPartOne(): void
    {
        $input = <<<EOL
7 6 4 2 1
1 2 7 8 9
9 7 6 2 1
1 3 2 4 5
8 6 4 4 1
1 3 6 7 9
EOL;

        $processor = new Day02Processor();
        $this->assertEquals(2, $processor->processPartOne($input));
    }

    public function testProcessPartTwo(): void
    {
        $input = <<<EOL
7 6 4 2 1
1 2 7 8 9
9 7 6 2 1
1 3 2 4 5
8 6 4 4 1
1 3 6 7 9
EOL;

        $processor = new Day02Processor();
        $this->assertEquals(4, $processor->processPartTwo($input));
    }
}
