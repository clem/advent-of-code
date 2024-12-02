<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2024\Day01;

use App\UseCase\Year2024\Day01\ColumnsExtractor;
use PHPUnit\Framework\TestCase;

class ColumnsExtractorTest extends TestCase
{
    public function testExtract(): void
    {
        $input = <<<EOL
3   4
4   3
2   5
1   3
3   9
3   3
EOL;

        $expected = [
            'left' => [1, 2, 3, 3, 3, 4],
            'right' => [3, 3, 3, 4, 5, 9],
        ];

        $this->assertEquals($expected, ColumnsExtractor::extract($input));
    }
}
