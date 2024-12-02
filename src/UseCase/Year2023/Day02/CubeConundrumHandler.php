<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day02;

final class CubeConundrumHandler
{
    private const int MAX_RED_CUBES = 12;

    private const int MAX_GREEN_CUBES = 13;

    private const int MAX_BLUE_CUBES = 14;

    public static function isGamePossible(string $game): bool
    {
        $gameId = self::getGameId($game);
        $gameRounds = str_replace("Game $gameId: ", '', $game);
        $rounds = explode('; ', $gameRounds);

        foreach ($rounds as $round) {
            if (!self::isRoundPossible($round)) {
                return false;
            }
        }

        return true;
    }

    public static function getGameId(string $game): int
    {
        preg_match('/^Game (\d+): .*$/', $game, $gameInfo);

        if (!isset($gameInfo[1])) {
            return 0;
        }

        return (int) $gameInfo[1];
    }

    private static function isRoundPossible(string $round): bool
    {
        $cubes = explode(', ', $round);

        foreach ($cubes as $colorCubes) {
            if (!self::isNumberOfCubesPossible($colorCubes)) {
                return false;
            }
        }

        return true;
    }

    private static function isNumberOfCubesPossible(string $colorCubes): bool
    {
        preg_match('/^(\d+) (red|green|blue)$/', $colorCubes, $cubeInfo);

        if (!isset($cubeInfo[1], $cubeInfo[2])) {
            return false;
        }

        return match($cubeInfo[2]) {
            'red' => (int) $cubeInfo[1] <= self::MAX_RED_CUBES,
            'green' => (int) $cubeInfo[1] <= self::MAX_GREEN_CUBES,
            'blue' => (int) $cubeInfo[1] <= self::MAX_BLUE_CUBES,
        };
    }

    public static function calculateFewestCubesPower(string $game): int
    {
        $gameId = self::getGameId($game);
        $gameRounds = str_replace("Game $gameId: ", '', $game);
        $rounds = explode('; ', $gameRounds);

        $maxRedCubes = 1;
        $maxGreenCubes = 1;
        $maxBlueCubes = 1;

        foreach ($rounds as $round) {
            $cubesPower = self::extractRoundCubesNumbers($round);

            $maxRedCubes = max($maxRedCubes, $cubesPower['red'] ?? 1);
            $maxGreenCubes = max($maxGreenCubes, $cubesPower['green'] ?? 1);
            $maxBlueCubes = max($maxBlueCubes, $cubesPower['blue'] ?? 1);
        }

        return $maxRedCubes * $maxGreenCubes * $maxBlueCubes;
    }

    /**
     * @return array<string, int>
     */
    private static function extractRoundCubesNumbers(string $round): array
    {
        $cubes = explode(', ', $round);

        $roundCubesNumbers = [];

        foreach ($cubes as $colorCubes) {
            preg_match('/^(\d+) (red|green|blue)$/', $colorCubes, $cubesInfo);
            if (!isset($cubesInfo[1], $cubesInfo[2])) {
                continue;
            }

            list(1 => $numberOfCubes, 2 => $cubesColor) = $cubesInfo;

            $roundCubesNumbers[$cubesColor] = (int) $numberOfCubes;
        }

        return $roundCubesNumbers;
    }
}
