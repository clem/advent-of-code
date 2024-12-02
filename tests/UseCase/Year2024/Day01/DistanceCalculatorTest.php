<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2024\Day01;

use App\UseCase\Year2024\Day01\DistanceCalculator;
use PHPUnit\Framework\TestCase;

class DistanceCalculatorTest extends TestCase
{
    public function testCalculator(): void
    {
        $left = [1, 2, 3, 3, 3, 4];
        $right = [3, 3, 3, 4, 5, 9];

        $this->assertEquals(11, DistanceCalculator::calculate($left, $right));
    }
}
