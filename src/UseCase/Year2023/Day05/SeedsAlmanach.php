<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day05;

final class SeedsAlmanach
{
    /**
     * @return array<int, int>
     */
    public function parseSeeds(string $input): array
    {
        $inputLines = explode("\n", $input);
        $seedsLine = array_shift($inputLines);

        $seeds = explode(
            ' ',
            str_replace('seeds: ', '', $seedsLine)
        );

        return array_map('intval', $seeds);
    }

    /**
     * @return array<string, array<AlmanacMap>>
     */
    public function parseAlmanacMapsList(string $input): array
    {
        $inputLines = explode("\n", $input);
        array_shift($inputLines);

        $activeMap = null;
        $maps = [];

        foreach ($inputLines as $line) {
            if (empty($line)) {
                continue;
            }

            if (str_contains($line, 'map')) {
                $activeMap = str_replace(' map:', '', $line);

                continue;
            }

            $maps[$activeMap][] = $this->convertLineToAlmanacMap($line);
        }

        return $maps;
    }

    /**
     * @param array<int, int> $seeds
     * @param array<string, array<AlmanacMap>> $mapsList
     */
    public function getMinSeedLocation(array $seeds, array $mapsList): int
    {
        $totalSeeds = count($seeds);
        for ($seedIndex = 0; $seedIndex < $totalSeeds; $seedIndex++) {
            foreach ($mapsList as $maps) {
                foreach ($maps as $map) {
                    if ($map->hasInRange($seeds[$seedIndex])) {
                        $seeds[$seedIndex] = $map->getValue($seeds[$seedIndex]);
                        break;
                    }
                }
            }
        }

        if ($seeds === []) {
            return 0;
        }

        return min($seeds);
    }

    /**
     * @return array<int>
     */
    public function parseSeedsRanges(string $input): array
    {
        $parsedSeeds = $this->parseSeeds($input);
        $seeds = [];

        $totalSeeds = count($parsedSeeds);
        for ($seedIndex = 0; $seedIndex < $totalSeeds; $seedIndex += 2) {
            $start = $parsedSeeds[$seedIndex];
            $length = $parsedSeeds[$seedIndex + 1];

            $seeds[] = range($start, $start + $length - 1);
        }

        return array_merge(...$seeds);
    }

    private function convertLineToAlmanacMap(string $line): AlmanacMap
    {
        $map = explode(' ', $line);

        return new AlmanacMap(
            (int) $map[0],
            (int) $map[1],
            (int) $map[2]
        );
    }
}
