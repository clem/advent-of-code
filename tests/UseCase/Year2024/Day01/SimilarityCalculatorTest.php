<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2024\Day01;

use App\UseCase\Year2024\Day01\SimilarityCalculator;
use PHPUnit\Framework\TestCase;

class SimilarityCalculatorTest extends TestCase
{
    public function testCalculate(): void
    {
        $left = [1, 2, 3, 3, 3, 4];
        $right = [3, 3, 3, 4, 5, 9];

        $this->assertEquals(31, SimilarityCalculator::calculate($left, $right));
    }
}
