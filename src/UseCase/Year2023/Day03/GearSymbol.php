<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day03;

class GearSymbol extends AbstractGearInfo
{
    public readonly string $symbol;

    public readonly int $size;

    public function __construct(string $symbol, int $posY, int $posX)
    {
        parent::__construct($posY, $posX);

        $this->symbol = $symbol;
        $this->size = 1;
    }

    public function isAsterisk(): bool
    {
        return $this->symbol === '*';
    }
}
