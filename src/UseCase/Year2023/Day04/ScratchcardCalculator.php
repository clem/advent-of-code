<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day04;

final class ScratchcardCalculator
{
    public function getCardNumber(string $card): int
    {
        $cardParts = explode(':', $card);
        $cardNumber = str_replace(['Card', ' '], '', $cardParts[0]);

        return (int) $cardNumber;
    }

    public function calculateCardPoints(string $card): int
    {
        $myWinningNumbers = $this->getMyWinningNumbers($card);

        return $this->calculateScore(count($myWinningNumbers));
    }

    /**
     * @return array<int, int>
     */
    public function calculateCardWinningCards(string $card): array
    {
        $cardNumber = $this->getCardNumber($card);
        $myWinningNumbers = $this->getMyWinningNumbers($card);

        return $this->generateWinningCards($cardNumber, count($myWinningNumbers));
    }

    /**
     * @return array<int, int>
     */
    private function getMyWinningNumbers(string $card): array
    {
        $cardNumbersPart = $this->getCardNumbersPart($card);
        $cardsParts = explode('|', $cardNumbersPart);

        $winningNumbers = $this->formatScratchcardNumbers($cardsParts[0]);
        $myNumbers = $this->formatScratchcardNumbers($cardsParts[1]);

        return array_intersect($winningNumbers, $myNumbers);
    }

    private function getCardNumbersPart(string $card): string
    {
        $cardParts = explode(':', $card);

        return $cardParts[1];
    }

    /**
     * @return array<int, int>
     */
    private function formatScratchcardNumbers(string $numbers): array
    {
        return array_map(
            fn (string $number) => (int) $number,
            array_filter(explode(' ', $numbers))
        );
    }

    private function calculateScore(int $totalWinningCards): int
    {
        if ($totalWinningCards === 0) {
            return 0;
        }

        $score = 1;

        for ($cardIndex = 1; $cardIndex < $totalWinningCards; $cardIndex++) {
            $score *= 2;
        }

        return $score;
    }

    /**
     * @return array<int, int>
     */
    private function generateWinningCards(int $cardNumber, int $numberOfWinningCards): array
    {
        $winningCards = [];
        $cardNumber++;

        for ($modifier = 0; $modifier < $numberOfWinningCards; $modifier++) {
            $winningCards[] = $cardNumber + $modifier;
        }

        return $winningCards;
    }
}
