<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day03;

use App\UseCase\DayProcessorInterface;

final class Day03Processor implements DayProcessorInterface
{
    private GearRatiosExtractor $gearRatiosExtractor;

    public function __construct()
    {
        $this->gearRatiosExtractor = new GearRatiosExtractor();
    }

    public function processPartOne(string $input): int
    {
        $inputLines = $this->gearRatiosExtractor->extract($input);
        $numbersTotal = 0;
        $partNumbers = [];

        foreach ($inputLines as $lineIndex => $inputLine) {
            foreach ($inputLine as $gearInfo) {
                if (!($gearInfo instanceof GearNumber)
                || $this->isGearNumberAlreadyRegistered($partNumbers, $gearInfo)) {
                    continue;
                }

                /** @var GearNumber $gearInfo */
                $adjacentLinesSymbols = array_merge(
                    $this->getLineGearSymbols($inputLines[$lineIndex - 1] ?? []),
                    $this->getLineGearSymbols($inputLine),
                    $this->getLineGearSymbols($inputLines[$lineIndex + 1] ?? []),
                );

                foreach ($adjacentLinesSymbols as $gearSymbol) {
                    /** @var GearSymbol $gearSymbol */
                    if (!GearRatiosPositionsHandler::isNumberAdjacentToSymbol($gearInfo, $gearSymbol)) {
                        continue;
                    }

                    $numbersTotal += $gearInfo->number;
                    $partNumbers[] = $gearInfo;
                }
            }
        }

        return $numbersTotal;
    }

    /**
     * @param array<AbstractGearInfo> $line
     * @return array<GearSymbol>
     */
    private function getLineGearSymbols(array $line): array
    {
        return array_filter($line, static fn ($gearInfo) => $gearInfo instanceof GearSymbol);
    }

    /**
     * @param array<GearNumber> $partNumbers
     */
    private function isGearNumberAlreadyRegistered(array $partNumbers, GearNumber $gearNumber): bool
    {
        return in_array($gearNumber, $partNumbers, true);
    }

    public function processPartTwo(string $input): int
    {
        $inputLines = $this->gearRatiosExtractor->extract($input);
        $numbersTotal = 0;

        foreach ($inputLines as $lineIndex => $inputLine) {
            foreach ($inputLine as $gearInfo) {
                if (!($gearInfo instanceof GearSymbol) || !$gearInfo->isAsterisk()) {
                    continue;
                }

                /** @var GearSymbol $gearInfo */
                $gearNumbers = [];
                $adjacentLinesNumbers = array_merge(
                    $this->getLineGearNumbers($inputLines[$lineIndex - 1] ?? []),
                    $this->getLineGearNumbers($inputLine),
                    $this->getLineGearNumbers($inputLines[$lineIndex + 1] ?? []),
                );

                foreach ($adjacentLinesNumbers as $gearNumber) {
                    /** @var GearNumber $gearNumber */
                    if (GearRatiosPositionsHandler::isNumberAdjacentToSymbol($gearNumber, $gearInfo)) {
                        $gearNumbers[] = $gearNumber;
                    }
                }

                if (count($gearNumbers) === 2) {
                    $numbersTotal += $gearNumbers[0]->number * $gearNumbers[1]->number;
                }
            }
        }

        return $numbersTotal;
    }

    /**
     * @param array<AbstractGearInfo> $line
     * @return array<GearNumber>
     */
    private function getLineGearNumbers(array $line): array
    {
        return array_filter($line, static fn ($gearInfo) => $gearInfo instanceof GearNumber);
    }
}
