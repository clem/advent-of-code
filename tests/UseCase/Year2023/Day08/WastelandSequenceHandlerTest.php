<?php

declare(strict_types=1);

namespace App\Tests\UseCase\Year2023\Day08;

use App\UseCase\Year2023\Day08\WastelandSequenceHandler;
use PHPUnit\Framework\TestCase;

class WastelandSequenceHandlerTest extends TestCase
{
    private WastelandSequenceHandler $handler;

    /**
     * @dataProvider getParseData
     * @param array<int, string> $expected
     */
    public function testParse(string $line, array $expected): void
    {
        $this->assertEquals($expected, $this->handler->parse($line));
    }

    /**
     * @return iterable<array{line: string, expected: array<int, string>}>
     */
    public static function getParseData(): iterable
    {
        yield [
            'line' => '',
            'expected' => [],
        ];

        yield [
            'line' => 'AAA = (BBB, CCC)',
            'expected' => [],
        ];

        yield [
            'line' => 'LR',
            'expected' => ['L', 'R'],
        ];

        yield [
            'line' => 'LLR',
            'expected' => ['L', 'L', 'R'],
        ];
    }

    /**
     * @dataProvider getGetDirectionAtIndexData
     */
    public function testGetDirectionAtIndex(string $input, int $index, string $expected): void
    {
        $this->handler->parse($input);

        $this->assertEquals($expected, $this->handler->getDirectionAtIndex($index));
    }

    /**
     * @return iterable<array{input: string, index: int, expected: string}>
     */
    public static function getGetDirectionAtIndexData(): iterable
    {
        yield [
            'input' => 'LR',
            'index' => 0,
            'expected' => 'L',
        ];

        yield [
            'input' => 'LR',
            'index' => 1,
            'expected' => 'R',
        ];

        yield [
            'input' => 'LR',
            'index' => 2,
            'expected' => 'L',
        ];

        yield [
            'input' => 'LR',
            'index' => 3,
            'expected' => 'R',
        ];

        yield [
            'input' => 'LLR',
            'index' => 7,
            'expected' => 'L',
        ];
    }

    protected function setUp(): void
    {
        $this->handler = new WastelandSequenceHandler();
    }
}
