<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day05;

use App\UseCase\DayProcessorInterface;

final class Day05Processor implements DayProcessorInterface
{
    private SeedsAlmanach $seedsAlmanac;

    public function __construct()
    {
        $this->seedsAlmanac = new SeedsAlmanach();
    }

    public function processPartOne(string $input): int
    {
        $seeds = $this->seedsAlmanac->parseSeeds($input);
        $mapsList = $this->seedsAlmanac->parseAlmanacMapsList($input);

        return $this->seedsAlmanac->getMinSeedLocation($seeds, $mapsList);
    }

    /**
     * This is a naive implementation that works for the sample input.
     * But it takes too long to process the real input :(
     * Unfortunately, I won't/don't have time to optimize it.
     */
    public function processPartTwo(string $input): int
    {
        $seeds = $this->seedsAlmanac->parseSeedsRanges($input);
        $mapsList = $this->seedsAlmanac->parseAlmanacMapsList($input);

        return $this->seedsAlmanac->getMinSeedLocation($seeds, $mapsList);
    }
}
