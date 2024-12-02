<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day08;

use App\UseCase\DayProcessorInterface;
use GMP;

final class Day08Processor implements DayProcessorInterface
{
    private WastelandMapsParser $wastelandMapsParser;

    private WastelandSequenceHandler $wastelandSequenceHandler;

    public function __construct()
    {
        $this->wastelandMapsParser = new WastelandMapsParser();
        $this->wastelandSequenceHandler = new WastelandSequenceHandler();
    }

    public function processPartOne(string $input): int
    {
        $maps = $this->wastelandMapsParser->parse($input);
        $this->wastelandSequenceHandler->parse($input);

        return $this->calculateActiveMapStepsInMaps(
            $maps['AAA'],
            $maps,
            static fn (WastelandMap $map) => $map->start !== 'ZZZ'
        );
    }

    public function processPartTwo(string $input): int
    {
        $maps = $this->wastelandMapsParser->parse($input);
        $this->wastelandSequenceHandler->parse($input);

        $startingMaps = $this->getStartingMaps($maps);
        $mapsSteps = [];

        foreach ($startingMaps as $startingMap) {
            /** @var WastelandMap $startingMap */
            $mapsSteps[$startingMap->start] = $this->calculateActiveMapStepsInMaps(
                $startingMap,
                $maps,
                static fn (WastelandMap $map) => !$map->isEndMap()
            );
        }

        return $this->calculateStepsLeastCommonMultiple($mapsSteps);
    }

    /**
     * @param array<string, WastelandMap> $maps
     */
    private function calculateActiveMapStepsInMaps(WastelandMap $map, array $maps, callable $whileCondition): int
    {
        $activeMap = $map;
        $steps = 0;

        while ($whileCondition($activeMap)) {
            $direction = $this->wastelandSequenceHandler->getDirectionAtIndex($steps);
            $activeMap = $maps[$activeMap->getDirection($direction)];
            $steps++;
        }

        return $steps;
    }

    /**
     * @param array<string, WastelandMap> $maps
     * @return array<string, WastelandMap>
     */
    private function getStartingMaps(array $maps): array
    {
        $activeMaps = [];

        foreach ($maps as $map) {
            /** @var WastelandMap $map */
            if ($map->isStartMap()) {
                $activeMaps[$map->start] = $map;
            }
        }

        return $activeMaps;
    }

    /**
     * @param array<string, int> $steps
     */
    private function calculateStepsLeastCommonMultiple(array $steps): int
    {
        /** @var GMP|int|string $lcm */
        $lcm = array_shift($steps);

        foreach ($steps as $step) {
            $lcm = gmp_lcm($lcm, $step);
        }

        return gmp_intval($lcm);
    }
}
