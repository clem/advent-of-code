<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day03;

final class GearRatiosPositionsHandler
{
    public static function isNumberAdjacentToSymbol(GearNumber $number, GearSymbol $symbol): bool
    {
        return self::isNumberAdjacentToSymbolOnTheSameLine($number, $symbol)
            || self::isNumberAdjacentToSymbolOnPreviousLine($number, $symbol)
            || self::isNumberAdjacentToSymbolOnNextLine($number, $symbol);
    }

    private static function isNumberAdjacentToSymbolOnTheSameLine(GearNumber $number, GearSymbol $symbol): bool
    {
        if ($number->posY !== $symbol->posY) {
            return false;
        }

        return ($number->posX - 1 === $symbol->posX)
            || ($number->posX + $number->size === $symbol->posX);
    }

    private static function isNumberAdjacentToSymbolOnPreviousLine(GearNumber $number, GearSymbol $symbol): bool
    {
        return self::isNumberAdjacentToSymbolOnAnotherLine($number, $symbol, -1);
    }

    private static function isNumberAdjacentToSymbolOnNextLine(GearNumber $number, GearSymbol $symbol): bool
    {
        return self::isNumberAdjacentToSymbolOnAnotherLine($number, $symbol, 1);
    }

    private static function isNumberAdjacentToSymbolOnAnotherLine(
        GearNumber $number,
        GearSymbol $symbol,
        int $lineModifier
    ): bool {
        if ($number->posY + $lineModifier !== $symbol->posY) {
            return false;
        }

        return $number->isPositionInAdjacentXPositions($symbol->posX);
    }
}
