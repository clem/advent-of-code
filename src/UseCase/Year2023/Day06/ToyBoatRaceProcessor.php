<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day06;

final class ToyBoatRaceProcessor
{
    public function computeRaceTotalWaysToWin(ToyBoatRace $race): int
    {
        $numberOfWaysToWin = 0;
        for ($milliseconds = 0; $milliseconds < $race->time; $milliseconds++) {
            if ($this->doesRaceWinsAtTime($race, $milliseconds)) {
                $numberOfWaysToWin++;
            }
        }

        return $numberOfWaysToWin;
    }

    private function doesRaceWinsAtTime(ToyBoatRace $race, int $milliseconds): bool
    {
        if ($milliseconds === 0 || $milliseconds === $race->time) {
            return false;
        }

        $movingDistance = $milliseconds * ($race->time - $milliseconds);

        return $movingDistance > $race->distance;
    }
}
