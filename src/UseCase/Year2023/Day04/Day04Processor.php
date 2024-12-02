<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day04;

use App\UseCase\DayProcessorInterface;

final class Day04Processor implements DayProcessorInterface
{
    private ScratchcardCalculator $scratchcardCalculator;

    public function __construct()
    {
        $this->scratchcardCalculator = new ScratchcardCalculator();
    }

    public function processPartOne(string $input): int
    {
        return array_sum(
            array_map(
                fn (string $card)
                    => $this->scratchcardCalculator->calculateCardPoints($card),
                explode("\n", $input)
            )
        );
    }

    public function processPartTwo(string $input): int
    {
        $inputGames = explode("\n", $input);
        $cardsPile = [];

        foreach ($inputGames as $card) {
            $cardNumber = $this->scratchcardCalculator->getCardNumber($card);

            if (!isset($cardsPile[$cardNumber])) {
                $cardsPile[$cardNumber] = 0;
            }
            $cardsPile[$cardNumber] += 1;

            $winningCards = $this->scratchcardCalculator->calculateCardWinningCards($card);
            foreach ($winningCards as $winningCard) {
                if (!isset($cardsPile[$winningCard])) {
                    $cardsPile[$winningCard] = 0;
                }

                $cardsPile[$winningCard] += $cardsPile[$cardNumber];
            }
        }

        return array_sum($cardsPile);
    }
}
