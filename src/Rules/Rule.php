<?php

declare(strict_types=1);

namespace Fater\Typography\Src\Rules;

abstract class Rule
{
    public function __toString(): string
    {
        return static::class;
    }

    abstract public function handle(string $text): string;
}
