<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day08;

final class WastelandSequenceHandler
{
    /**
     * @var array<int, string>
     */
    private array $sequence;

    /**
     * @return array<int, string>
     */
    public function parse(string $input): array
    {
        $lines = explode("\n", $input);
        $sequenceLine = array_shift($lines);
        unset($lines);

        $this->sequence = $this->parseSequence($sequenceLine);

        return $this->sequence;
    }

    public function getDirectionAtIndex(int $index): string
    {
        if (isset($this->sequence[$index])) {
            return $this->sequence[$index];
        }

        $predictedIndex = $index % count($this->sequence);

        return $this->sequence[$predictedIndex];
    }

    /**
     * @return array<int, string>
     */
    private function parseSequence(string $line): array
    {
        if (empty($line) || preg_replace('/L*R*/', '', $line) !== '') {
            return [];
        }

        return str_split($line);
    }
}
