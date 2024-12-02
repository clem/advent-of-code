<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day02;

use App\UseCase\DayProcessorInterface;

final class Day02Processor implements DayProcessorInterface
{
    public function processPartOne(string $input): int
    {
        return $this->processPart(
            $input,
            [$this, 'checkCubeConundrumGames']
        );
    }

    public function processPartTwo(string $input): int
    {
        return $this->processPart(
            $input,
            [$this, 'calculateCubeConundrumGamesPowerTotal']
        );
    }

    private function processPart(string $input, callable $extractor): int
    {
        return array_sum(
            array_map(
                $extractor,
                explode("\n", $input)
            )
        );
    }

    private function checkCubeConundrumGames(string $game): int
    {
        return CubeConundrumHandler::isGamePossible($game)
            ? CubeConundrumHandler::getGameId($game)
            : 0;
    }

    private function calculateCubeConundrumGamesPowerTotal(string $game): int
    {
        return CubeConundrumHandler::calculateFewestCubesPower($game);
    }
}
