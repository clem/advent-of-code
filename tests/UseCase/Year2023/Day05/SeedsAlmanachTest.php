<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2023\Day05;

use App\UseCase\Year2023\Day05\AlmanacMap;
use App\UseCase\Year2023\Day05\SeedsAlmanach;
use PHPUnit\Framework\TestCase;

class SeedsAlmanachTest extends TestCase
{
    private SeedsAlmanach $seedsAlmanach;

    public function testParseSeeds(): void
    {
        $input = <<<EOF
seeds: 79 14 55 13
EOF;

        $this->assertEquals(
            [79, 14, 55, 13],
            $this->seedsAlmanach->parseSeeds($input)
        );
    }

    public function testAlmanacMapsList(): void
    {
        $input = <<<EOF
seeds: 79 14 55 13

seed-to-soil map:
50 98 2
52 50 48

soil-to-fertilizer map:
0 15 37
37 52 2
39 0 15

fertilizer-to-water map:
49 53 8
0 11 42
42 0 7
57 7 4

water-to-light map:
88 18 7
18 25 70

light-to-temperature map:
45 77 23
81 45 19
68 64 13

temperature-to-humidity map:
0 69 1
1 0 69

humidity-to-location map:
60 56 37
56 93 4
EOF;

        $expected = [
            'seed-to-soil' => [
                new AlmanacMap(50, 98, 2),
                new AlmanacMap(52, 50, 48),
            ],
            'soil-to-fertilizer' => [
                new AlmanacMap(0, 15, 37),
                new AlmanacMap(37, 52, 2),
                new AlmanacMap(39, 0, 15),
            ],
            'fertilizer-to-water' => [
                new AlmanacMap(49, 53, 8),
                new AlmanacMap(0, 11, 42),
                new AlmanacMap(42, 0, 7),
                new AlmanacMap(57, 7, 4),
            ],
            'water-to-light' => [
                new AlmanacMap(88, 18, 7),
                new AlmanacMap(18, 25, 70),
            ],
            'light-to-temperature' => [
                new AlmanacMap(45, 77, 23),
                new AlmanacMap(81, 45, 19),
                new AlmanacMap(68, 64, 13),
            ],
            'temperature-to-humidity' => [
                new AlmanacMap(0, 69, 1),
                new AlmanacMap(1, 0, 69),
            ],
            'humidity-to-location' => [
                new AlmanacMap(60, 56, 37),
                new AlmanacMap(56, 93, 4),
            ]
        ];

        $this->assertEquals(
            $expected,
            $this->seedsAlmanach->parseAlmanacMapsList($input)
        );
    }

    public function testParseSeedsRanges(): void
    {
        $input = <<<EOF
seeds: 79 14 55 13
EOF;

        $this->assertEquals(
            [
                79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92,
                55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67
            ],
            $this->seedsAlmanach->parseSeedsRanges($input)
        );
    }

    protected function setUp(): void
    {
        $this->seedsAlmanach = new SeedsAlmanach();
    }
}
