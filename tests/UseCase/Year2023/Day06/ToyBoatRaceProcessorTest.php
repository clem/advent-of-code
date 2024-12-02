<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2023\Day06;

use App\UseCase\Year2023\Day06\ToyBoatRace;
use App\UseCase\Year2023\Day06\ToyBoatRaceProcessor;
use PHPUnit\Framework\TestCase;

class ToyBoatRaceProcessorTest extends TestCase
{
    private ToyBoatRaceProcessor $processor;

    /**
     * @dataProvider provideRaces
     */
    public function testComputeRaceTotalWaysToWin(ToyBoatRace $race, int $expectedNumberOfWaysToWin): void
    {
        $this->assertEquals(
            $expectedNumberOfWaysToWin,
            $this->processor->computeRaceTotalWaysToWin($race)
        );
    }

    /**
     * @return iterable<array{race: ToyBoatRace, expectedNumberOfWaysToWin: int}>
     */
    public static function provideRaces(): iterable
    {
        yield [
            'race' => new ToyBoatRace(7, 9),
            'expectedNumberOfWaysToWin' => 4,
        ];

        yield [
            'race' => new ToyBoatRace(15, 40),
            'expectedNumberOfWaysToWin' => 8,
        ];

        yield [
            'race' => new ToyBoatRace(30, 200),
            'expectedNumberOfWaysToWin' => 9,
        ];
    }

    protected function setUp(): void
    {
        $this->processor = new ToyBoatRaceProcessor();
    }
}
