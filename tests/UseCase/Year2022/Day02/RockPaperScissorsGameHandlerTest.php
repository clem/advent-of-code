<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2022\Day02;

use App\UseCase\Year2022\Day02\RockPaperScissorsGameHandler;
use PHPUnit\Framework\TestCase;

class RockPaperScissorsGameHandlerTest extends TestCase
{
    public function testHandleRoundMove(): void
    {
        $inputs = [
            ['moves' => ['A', 'Y'], 'expected' => 8],
            ['moves' => ['B', 'X'], 'expected' => 1],
            ['moves' => ['C', 'Z'], 'expected' => 6],
        ];

        foreach ($inputs as $input) {
            $this->assertEquals(
                $input['expected'],
                RockPaperScissorsGameHandler::handleRoundMoves(
                    $input['moves'][0].' '.$input['moves'][1]
                )
            );
        }
    }

    public function testHandleRoundEnd(): void
    {
        $inputs = [
            ['moves' => ['A', 'Y'], 'expected' => 4],
            ['moves' => ['B', 'X'], 'expected' => 1],
            ['moves' => ['C', 'Z'], 'expected' => 7],
        ];

        foreach ($inputs as $input) {
            $this->assertEquals(
                $input['expected'],
                RockPaperScissorsGameHandler::handleRoundEnd(
                    $input['moves'][0].' '.$input['moves'][1]
                )
            );
        }
    }
}
