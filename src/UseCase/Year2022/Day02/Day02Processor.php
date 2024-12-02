<?php

declare(strict_types=1);

namespace App\UseCase\Year2022\Day02;

use App\UseCase\DayProcessorInterface;

final class Day02Processor implements DayProcessorInterface
{
    public function processPartOne(string $input): int
    {
        return array_sum(
            array_map(
                fn (string $round) => RockPaperScissorsGameHandler::handleRoundMoves($round),
                explode("\n", $input)
            )
        );
    }

    public function processPartTwo(string $input): int
    {
        return array_sum(
            array_map(
                fn (string $round) => RockPaperScissorsGameHandler::handleRoundEnd($round),
                explode("\n", $input)
            )
        );
    }
}
