<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day03;

class GearNumber extends AbstractGearInfo
{
    public readonly int $number;

    public readonly int $size;

    /**
     * @var array<int, int>
     */
    private array $xPositions;

    public function __construct(int $number, int $posY, int $posX)
    {
        parent::__construct($posY, $posX);

        $this->number = $number;
        $this->size = strlen((string) $number);
        $this->xPositions = $this->calculateAdjacentXPositions($posX, $this->size);
    }

    public function isPositionInAdjacentXPositions(int $posX): bool
    {
        return in_array($posX, $this->xPositions, true);
    }

    /**
     * @return array<int, int>
     */
    private function calculateAdjacentXPositions(int $posX, int $size): array
    {
        return range($posX - 1, $posX + $size);
    }
}
