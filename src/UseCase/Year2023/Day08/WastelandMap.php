<?php

declare(strict_types=1);

namespace App\UseCase\Year2023\Day08;

final class WastelandMap
{
    public string $start;

    public string $left;

    public string $right;

    public function __construct(string $start, string $left, string $right)
    {
        $this->start = $start;
        $this->left = $left;
        $this->right = $right;
    }

    public function getDirection(string $direction): string
    {
        return $direction === 'L' ? $this->left : $this->right;
    }

    public function isStartMap(): bool
    {
        return str_ends_with($this->start, 'A');
    }

    public function isEndMap(): bool
    {
        return str_ends_with($this->start, 'Z');
    }
}
