<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day06;

class ToyBoatRaceParser
{
    /**
     * @return array<int, ToyBoatRace>
     */
    public function parseRacesFromInput(string $input): array
    {
        $times = $this->parseTimesFromInput($input);
        $distances = $this->parseDistancesFromInput($input);

        return $this->convertTimesAndDistancesToRaces($times, $distances);
    }

    /**
     * @return array<int, int>
     */
    private function parseTimesFromInput(string $input): array
    {
        return $this->parseDataFromInput($input, 'Time');
    }

    /**
     * @return array<int, int>
     */
    private function parseDistancesFromInput(string $input): array
    {
        return $this->parseDataFromInput($input, 'Distance');
    }

    /**
     * @return array<int, int>
     */
    private function parseDataFromInput(string $input, string $name): array
    {
        $lines = explode("\n", $input);
        $datasLines = array_filter(
            $lines,
            static fn ($line) => str_contains($line, $name . ':')
        );

        /** @var string $dataLine */
        $dataLine = array_shift($datasLines);
        $dataLine = str_replace($name.':', '', $dataLine);

        return $this->parseDataLine($dataLine);
    }

    /**
     * @return array<int, int>
     */
    private function parseDataLine(string $line): array
    {
        $datas = array_filter(
            explode(' ', $line),
            static fn ($data) => !empty($data)
        );

        return array_map('intval', array_values($datas));
    }

    /**
     * @param array<int, int> $times
     * @param array<int, int> $distances
     * @return array<int, ToyBoatRace>
     */
    private function convertTimesAndDistancesToRaces(array $times, array $distances): array
    {
        if (count($times) !== count($distances)) {
            throw new \RuntimeException('Times and distances must have the same length!');
        }

        $races = [];
        foreach ($times as $index => $time) {
            $races[] = new ToyBoatRace((int) $time, (int) $distances[$index]);
        }

        return $races;
    }
}
