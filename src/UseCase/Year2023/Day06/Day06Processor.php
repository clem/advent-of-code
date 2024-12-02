<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day06;

use App\UseCase\DayProcessorInterface;

final class Day06Processor implements DayProcessorInterface
{
    private ToyBoatRaceParser $raceParser;

    private ToyBoatRaceProcessor $raceProcessor;

    public function __construct()
    {
        $this->raceParser = new ToyBoatRaceParser();
        $this->raceProcessor = new ToyBoatRaceProcessor();
    }

    public function processPartOne(string $input): int
    {
        return $this->processInput($input);
    }

    public function processPartTwo(string $input): int
    {
        $input = str_replace(' ', '', $input);

        return $this->processInput($input);
    }

    private function processInput(string $input): int
    {
        $races = $this->raceParser->parseRacesFromInput($input);

        return (int) array_product(array_map(
            fn (ToyBoatRace $race)
                => $this->raceProcessor->computeRaceTotalWaysToWin($race),
            $races
        ));
    }
}
