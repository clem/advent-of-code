<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2023\Day03;

use App\UseCase\Year2023\Day03\GearNumber;
use App\UseCase\Year2023\Day03\GearRatiosExtractor;
use App\UseCase\Year2023\Day03\GearSymbol;
use PHPUnit\Framework\TestCase;

class GearRatiosExtractorTest extends TestCase
{
    private GearRatiosExtractor $gearRatiosExtractor;

    public function testExtract(): void
    {
        $input = <<<EOF
467..114..
...*......
..35..633.
......#...
617*......
.....+.58.
..592.....
......755.
...$.*....
.664.598..
EOF;

        $expected = [
            0 => [
                new GearNumber(467, 0, 0),
                new GearNumber(114, 0, 5),
            ],
            1 => [
                new GearSymbol('*', 1, 3),
            ],
            2 => [
                new GearNumber(35, 2, 2),
                new GearNumber(633, 2, 6),
            ],
            3 => [
                new GearSymbol('#', 3, 6),
            ],
            4 => [
                new GearNumber(617, 4, 0),
                new GearSymbol('*', 4, 3),
            ],
            5 => [
                new GearSymbol('+', 5, 5),
                new GearNumber(58, 5, 7),
            ],
            6 => [
                new GearNumber(592, 6, 2),
            ],
            7 => [
                new GearNumber(755, 7, 6),
            ],
            8 => [
                new GearSymbol('$', 8, 3),
                new GearSymbol('*', 8, 5),
            ],
            9 => [
                new GearNumber(664, 9, 1),
                new GearNumber(598, 9, 5),
            ],
        ];

        $this->assertEquals($expected, $this->gearRatiosExtractor->extract($input));
    }

    /**
     * @dataProvider extractLineDataProvider
     * @param array<GearNumber|GearSymbol> $expected
     */
    public function testExtractLine(string $input, array $expected, int $lineNumber): void
    {
        $this->assertEquals(
            $expected,
            $this->gearRatiosExtractor->extractLine($lineNumber, $input)
        );
    }

    /**
     * @return iterable<array{input: string, expected: array<GearNumber|GearSymbol>, lineNumber: int}>
     */
    public static function extractLineDataProvider(): iterable
    {
        yield [
            'input' => <<<EOF
........$...552*127....153..988+...502..842....*....588.....441.468......481..........314...715.57...............#............163..992..512
EOF,
            'expected' => [
                new GearSymbol('$', 0, 8),
                new GearNumber(552, 0, 12),
                new GearSymbol('*', 0, 15),
                new GearNumber(127, 0, 16),
                new GearNumber(153, 0, 23),
                new GearNumber(988, 0, 28),
                new GearSymbol('+', 0, 31),
                new GearNumber(502, 0, 35),
                new GearNumber(842, 0, 40),
                new GearSymbol('*', 0, 47),
                new GearNumber(588, 0, 52),
                new GearNumber(441, 0, 60),
                new GearNumber(468, 0, 64),
                new GearNumber(481, 0, 73),
                new GearNumber(314, 0, 86),
                new GearNumber(715, 0, 92),
                new GearNumber(57, 0, 96),
                new GearSymbol('#', 0, 113),
                new GearNumber(163, 0, 126),
                new GearNumber(992, 0, 131),
                new GearNumber(512, 0, 136),
            ],
            'lineNumber' => 0,
        ];

        yield [
            'input' => <<<EOF
........................*.....150.............*..............8.........511...................*........#.....837.*......*....*...............
EOF,
            'expected' => [
                new GearSymbol('*', 1, 24),
                new GearNumber(150, 1, 30),
                new GearSymbol('*', 1, 46),
                new GearNumber(8, 1, 61),
                new GearNumber(511, 1, 71),
                new GearSymbol('*', 1, 93),
                new GearSymbol('#', 1, 102),
                new GearNumber(837, 1, 108),
                new GearSymbol('*', 1, 112),
                new GearSymbol('*', 1, 119),
                new GearSymbol('*', 1, 124),
            ],
            'lineNumber' => 1,
        ];

        yield [
            'input' => <<<EOF
..........#......361..........*...........*............-4.............165..609........922..133...........706..................*....552*127..
EOF,
            'expected' => [
                new GearSymbol('#', 2, 10),
                new GearNumber(361, 2, 17),
                new GearSymbol('*', 2, 30),
                new GearSymbol('*', 2, 42),
                new GearSymbol('-', 2, 55),
                new GearNumber(4, 2, 56),
                new GearNumber(165, 2, 70),
                new GearNumber(609, 2, 75),
                new GearNumber(922, 2, 86),
                new GearNumber(133, 2, 91),
                new GearNumber(706, 2, 105),
                new GearSymbol('*', 2, 126),
                new GearNumber(552, 2, 131),
                new GearSymbol('*', 2, 134),
                new GearNumber(127, 2, 135),
            ],
            'lineNumber' => 2,
        ];

        yield [
            'input' => <<<EOF
.456........920..855.913..............*.../.....325*316.......6.......208....486........715.....=...%.............................67........
EOF,
            'expected' => [
                new GearNumber(456, 3, 1),
                new GearNumber(920, 3, 12),
                new GearNumber(855, 3, 17),
                new GearNumber(913, 3, 21),
                new GearSymbol('*', 3, 38),
                new GearSymbol('/', 3, 42),
                new GearNumber(325, 3, 48),
                new GearSymbol('*', 3, 51),
                new GearNumber(316, 3, 52),
                new GearNumber(6, 3, 62),
                new GearNumber(208, 3, 70),
                new GearNumber(486, 3, 77),
                new GearNumber(715, 3, 88),
                new GearSymbol('=', 3, 96),
                new GearSymbol('%', 3, 100),
                new GearNumber(67, 3, 130),
            ],
            'lineNumber' => 3,
        ];
    }

    protected function setUp(): void
    {
        $this->gearRatiosExtractor = new GearRatiosExtractor();
    }
}
