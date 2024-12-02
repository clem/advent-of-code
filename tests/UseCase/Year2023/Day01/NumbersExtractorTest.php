<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2023\Day01;

use App\UseCase\Year2023\Day01\NumbersExtractor;
use PHPUnit\Framework\TestCase;

class NumbersExtractorTest extends TestCase
{
    public function testExtractNumbersFromString(): void
    {
        $tests = [
            '' => 0,
            'two1nine' => 11,
            '4nineeightseven2' => 42,
            'zoneight234' => 24,
            '7pqrstsix1teen' => 71,
        ];

        foreach ($tests as $input => $expected) {
            $this->assertEquals(
                $expected,
                NumbersExtractor::extractFirstAndLastNumbersFromString($input)
            );
        }
    }
}
