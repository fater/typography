<?php

declare(strict_types=1);

namespace Fater\Typography\Rules\Character;

use Fater\Typography\Rules\Rule;

/**
 * Replace dash
 */
class ReplaceDash extends Rule
{
    public function handle(string $text): string
    {
        return preg_replace(
            '/( |&nbsp;)(-)( |&nbsp;)/',
            '\1—\3',
            $text
        );
    }
}
