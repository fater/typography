<?php

declare(strict_types=1);

namespace Fater\Typography\Rules\Space;

use Fater\Typography\Rules\Rule;

/**
 * Add space after comma
 */
class AddSpaceAfterComma extends Rule
{
    public function handle(string $text): string
    {
        return preg_replace(
            '/([^,]+),([^ ].*)/U',
            '\1, \2',
            $text
        );
    }
}
