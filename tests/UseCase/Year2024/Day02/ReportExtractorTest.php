<?php
declare(strict_types=1);

namespace App\Tests\UseCase\Year2024\Day02;

use App\UseCase\Year2024\Day02\ReportExtractor;
use PHPUnit\Framework\TestCase;

class ReportExtractorTest extends TestCase
{
    public function testExtract(): void
    {
        $input = <<<EOL

7 6 4 2 1
1 2 7 8 9
9 7 6 2 1
1 3 2 4 5
8 6 4 4 1
1 3 6 7 9

EOL;
        $expected = [
            '7 6 4 2 1',
            '1 2 7 8 9',
            '9 7 6 2 1',
            '1 3 2 4 5',
            '8 6 4 4 1',
            '1 3 6 7 9',
        ];

        $this->assertEquals($expected, ReportExtractor::extract($input));
    }
}
