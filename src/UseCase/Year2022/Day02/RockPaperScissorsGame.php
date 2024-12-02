<?php

declare(strict_types=1);

namespace App\UseCase\Year2022\Day02;

final class RockPaperScissorsGame
{
    public const string ELF_ROCK = 'A';

    public const string ELF_PAPER = 'B';

    public const string ELF_SCISSORS = 'C';

    public const string USER_ROCK = 'X';

    public const string USER_PAPER = 'Y';

    public const string USER_SCISSORS = 'Z';

    public const int SCORE_LOSE = 0;

    public const int SCORE_DRAW = 3;

    public const int SCORE_WIN = 6;

    public const int SCORE_ROCK = 1;

    public const int SCORE_PAPER = 2;

    public const int SCORE_SCISSORS = 3;

    public const string END_LOSE = 'X';

    public const string END_DRAW = 'Y';

    public const string END_WIN = 'Z';
}
