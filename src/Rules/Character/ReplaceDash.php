<?php

declare(strict_types=1);

namespace Fater\Typography\Src\Rules\Character;

use Fater\Typography\Src\Rules\Rule;

/**
 * Replace dash
 */
class ReplaceDash extends Rule
{
    public function handle(string $text): string
    {
        return preg_replace(
            '/( - )/',
            ' — ',
            $text
        );
    }
}
