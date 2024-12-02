<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2023\Day04;

use App\UseCase\Year2023\Day04\ScratchcardCalculator;
use PHPUnit\Framework\TestCase;

class ScratchcardCalculatorTest extends TestCase
{
    private ScratchcardCalculator $calculator;

    /**
     * @dataProvider getCardNumberData
     */
    public function testGetCardNumber(string $scratchcard, int $expectedCardNumber): void
    {
        $this->assertEquals(
            $expectedCardNumber,
            $this->calculator->getCardNumber($scratchcard)
        );
    }

    /**
     * @return iterable<array{scratchcard: string, expectedCardNumber: int}>
     */
    public static function getCardNumberData(): iterable
    {
        yield [
            'scratchcard' => 'Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53',
            'expectedCardNumber' => 1,
        ];

        yield [
            'scratchcard' => 'Card 2: 13 32 20 16 61 | 61 30 68 82 17 32 24 19',
            'expectedCardNumber' => 2,
        ];

        yield [
            'scratchcard' => 'Card  3:  1 21 53 59 44 | 69 82 63 72 16 21 14  1',
            'expectedCardNumber' => 3,
        ];

        yield [
            'scratchcard' => 'Card  4: 41 92 73 84 69 | 59 84 76 51 58  5 54 83',
            'expectedCardNumber' => 4,
        ];

        yield [
            'scratchcard' => 'Card   5: 87 83 26 28 32 | 88 30 70 12 93 22 82 36',
            'expectedCardNumber' => 5,
        ];

        yield [
            'scratchcard' => 'Card   6: 31 18 13 56 72 | 74 77 10 23 35 67 36 11',
            'expectedCardNumber' => 6,
        ];
    }

    /**
     * @dataProvider calculateCardPointsData
     */
    public function testCalculateCardPoints(string $scratchcard, int $expectedPoints): void
    {
        $this->assertEquals(
            $expectedPoints,
            $this->calculator->calculateCardPoints($scratchcard)
        );
    }

    /**
     * @return iterable<array{scratchcard: string, expectedPoints: int}>
     */
    public static function calculateCardPointsData(): iterable
    {
        yield [
            'scratchcard' => 'Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53',
            'expectedPoints' => 8,
        ];

        yield [
            'scratchcard' => 'Card 2: 13 32 20 16 61 | 61 30 68 82 17 32 24 19',
            'expectedPoints' => 2,
        ];

        yield [
            'scratchcard' => 'Card 3:  1 21 53 59 44 | 69 82 63 72 16 21 14  1',
            'expectedPoints' => 2,
        ];

        yield [
            'scratchcard' => 'Card 4: 41 92 73 84 69 | 59 84 76 51 58  5 54 83',
            'expectedPoints' => 1,
        ];

        yield [
            'scratchcard' => 'Card 5: 87 83 26 28 32 | 88 30 70 12 93 22 82 36',
            'expectedPoints' => 0,
        ];

        yield [
            'scratchcard' => 'Card 6: 31 18 13 56 72 | 74 77 10 23 35 67 36 11',
            'expectedPoints' => 0,
        ];
    }

    /**
     * @dataProvider calculateCardWinningCardsData
     * @param array<int> $expectedCards
     */
    public function testCalculateCardWinningCards(string $scratchcard, array $expectedCards): void
    {
        $this->assertEquals(
            $expectedCards,
            $this->calculator->calculateCardWinningCards($scratchcard)
        );
    }

    /**
     * @return iterable<array{card: string, winningCards: array<int>}>
     */
    public static function calculateCardWinningCardsData(): iterable
    {
        yield [
            'card' => 'Card 1: 41 48 83 86 17 | 83 86  6 31 17  9 48 53',
            'winningCards' => [2, 3, 4, 5],
        ];

        yield [
            'card' => 'Card 2: 13 32 20 16 61 | 61 30 68 82 17 32 24 19',
            'winningCards' => [3, 4],
        ];

        yield [
            'card' => 'Card 3:  1 21 53 59 44 | 69 82 63 72 16 21 14  1',
            'winningCards' => [4, 5],
        ];

        yield [
            'card' => 'Card 4: 41 92 73 84 69 | 59 84 76 51 58  5 54 83',
            'winningCards' => [5],
        ];

        yield [
            'card' => 'Card 5: 87 83 26 28 32 | 88 30 70 12 93 22 82 36',
            'winningCards' => [],
        ];

        yield [
            'card' => 'Card 6: 31 18 13 56 72 | 74 77 10 23 35 67 36 11',
            'winningCards' => [],
        ];

        yield [
            'card' => 'Card 207: 52 14 61 69 16 53  1 34  9 77 | 21 59 75 39 60 40 38 74 95 97 46 80 19 28 64 66 57 37 41 90  7 62 32 58  4',
            'winningCards' => [],
        ];
    }

    protected function setUp(): void
    {
        $this->calculator = new ScratchcardCalculator();
    }
}
