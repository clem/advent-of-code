<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2023\Day01;

use App\UseCase\Year2023\Day01\SpelledOutConverter;
use PHPUnit\Framework\TestCase;

class SpelledOutConverterTest extends TestCase
{
    public function testConvert(): void
    {
        $tests = [
            '' => '',
            'two1nine' => 't2o1n9e',
            'eightwothree' => 'e8t2ot3e',
            'abcone2threexyz' => 'abco1e2t3exyz',
            'xtwone3four' => 'xt2o1e3f4r',
            '4nineeightseven2' => '4n9ee8ts7n2',
            'zoneight234' => 'zo1e8t234',
            '7pqrstsixteen' => '7pqrsts6xteen',
        ];

        foreach ($tests as $input => $expected) {
            $this->assertEquals(
                $expected,
                SpelledOutConverter::convertSpelledOutNumbers($input)
            );
        }
    }
}
