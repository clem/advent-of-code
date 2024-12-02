<?php

declare(strict_types=1);

namespace App\UseCase\Year2022\Day02;

final class RockPaperScissorsGameHandler
{
    public static function handleRoundMoves(string $round): int
    {
        if ($round === '') {
            return 0;
        }

        list($elfMove, $userMove) = explode(' ', $round);

        return match(true) {
            $elfMove === RockPaperScissorsGame::ELF_ROCK && $userMove === RockPaperScissorsGame::USER_ROCK
                => RockPaperScissorsGame::SCORE_DRAW + RockPaperScissorsGame::SCORE_ROCK,
            $elfMove === RockPaperScissorsGame::ELF_ROCK && $userMove === RockPaperScissorsGame::USER_PAPER
                => RockPaperScissorsGame::SCORE_WIN + RockPaperScissorsGame::SCORE_PAPER,
            $elfMove === RockPaperScissorsGame::ELF_ROCK && $userMove === RockPaperScissorsGame::USER_SCISSORS
                => RockPaperScissorsGame::SCORE_LOSE + RockPaperScissorsGame::SCORE_SCISSORS,

            $elfMove === RockPaperScissorsGame::ELF_PAPER && $userMove === RockPaperScissorsGame::USER_ROCK
                => RockPaperScissorsGame::SCORE_LOSE + RockPaperScissorsGame::SCORE_ROCK,
            $elfMove === RockPaperScissorsGame::ELF_PAPER && $userMove === RockPaperScissorsGame::USER_PAPER
                => RockPaperScissorsGame::SCORE_DRAW + RockPaperScissorsGame::SCORE_PAPER,
            $elfMove === RockPaperScissorsGame::ELF_PAPER && $userMove === RockPaperScissorsGame::USER_SCISSORS
                => RockPaperScissorsGame::SCORE_WIN + RockPaperScissorsGame::SCORE_SCISSORS,

            $elfMove === RockPaperScissorsGame::ELF_SCISSORS && $userMove === RockPaperScissorsGame::USER_ROCK
                => RockPaperScissorsGame::SCORE_WIN + RockPaperScissorsGame::SCORE_ROCK,
            $elfMove === RockPaperScissorsGame::ELF_SCISSORS && $userMove === RockPaperScissorsGame::USER_PAPER
                => RockPaperScissorsGame::SCORE_LOSE + RockPaperScissorsGame::SCORE_PAPER,
            $elfMove === RockPaperScissorsGame::ELF_SCISSORS && $userMove === RockPaperScissorsGame::USER_SCISSORS
                => RockPaperScissorsGame::SCORE_DRAW + RockPaperScissorsGame::SCORE_SCISSORS,

            true => 0,
        };
    }

    public static function handleRoundEnd(string $round): int
    {
        if ($round === '') {
            return 0;
        }

        list($elfMove, $roundEnd) = explode(' ', $round);

        return match(true) {
            $elfMove === RockPaperScissorsGame::ELF_ROCK && $roundEnd === RockPaperScissorsGame::END_LOSE
                => RockPaperScissorsGame::SCORE_LOSE + RockPaperScissorsGame::SCORE_SCISSORS,
            $elfMove === RockPaperScissorsGame::ELF_ROCK && $roundEnd === RockPaperScissorsGame::END_DRAW
                => RockPaperScissorsGame::SCORE_DRAW + RockPaperScissorsGame::SCORE_ROCK,
            $elfMove === RockPaperScissorsGame::ELF_ROCK && $roundEnd === RockPaperScissorsGame::END_WIN
                => RockPaperScissorsGame::SCORE_WIN + RockPaperScissorsGame::SCORE_PAPER,

            $elfMove === RockPaperScissorsGame::ELF_PAPER && $roundEnd === RockPaperScissorsGame::END_LOSE
                => RockPaperScissorsGame::SCORE_LOSE + RockPaperScissorsGame::SCORE_ROCK,
            $elfMove === RockPaperScissorsGame::ELF_PAPER && $roundEnd === RockPaperScissorsGame::END_DRAW
                => RockPaperScissorsGame::SCORE_DRAW + RockPaperScissorsGame::SCORE_PAPER,
            $elfMove === RockPaperScissorsGame::ELF_PAPER && $roundEnd === RockPaperScissorsGame::END_WIN
                => RockPaperScissorsGame::SCORE_WIN + RockPaperScissorsGame::SCORE_SCISSORS,

            $elfMove === RockPaperScissorsGame::ELF_SCISSORS && $roundEnd === RockPaperScissorsGame::END_LOSE
                => RockPaperScissorsGame::SCORE_LOSE + RockPaperScissorsGame::SCORE_PAPER,
            $elfMove === RockPaperScissorsGame::ELF_SCISSORS && $roundEnd === RockPaperScissorsGame::END_DRAW
                => RockPaperScissorsGame::SCORE_DRAW + RockPaperScissorsGame::SCORE_SCISSORS,
            $elfMove === RockPaperScissorsGame::ELF_SCISSORS && $roundEnd === RockPaperScissorsGame::END_WIN
                => RockPaperScissorsGame::SCORE_WIN + RockPaperScissorsGame::SCORE_ROCK,

            true => 0,
        };
    }
}
