<?php

declare(strict_types=1);

namespace Typography\Src\Rules;

abstract class Rule
{
    abstract public function handle(string $text): string;

    public function __toString(): string
    {
        return static::class;
    }
}
