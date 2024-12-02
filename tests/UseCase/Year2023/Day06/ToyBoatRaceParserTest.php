<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2023\Day06;

use App\UseCase\Year2023\Day06\ToyBoatRace;
use App\UseCase\Year2023\Day06\ToyBoatRaceParser;
use PHPUnit\Framework\TestCase;

class ToyBoatRaceParserTest extends TestCase
{
    private ToyBoatRaceParser $parser;

    public function testParseRacesFromInput(): void
    {
        $input = <<<EOF
Time:      7  15   30
Distance:  9  40  200
EOF;

        $races = $this->parser->parseRacesFromInput($input);

        $this->assertCount(3, $races);
        $this->assertEquals(
            [
                new ToyBoatRace(7, 9),
                new ToyBoatRace(15, 40),
                new ToyBoatRace(30, 200),
            ],
            $races
        );
    }

    protected function setUp(): void
    {
        $this->parser = new ToyBoatRaceParser();
    }
}
