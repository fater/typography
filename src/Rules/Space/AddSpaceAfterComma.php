<?php

declare(strict_types=1);

namespace Fater\Typography\Src\Rules\Space;

use Fater\Typography\Src\Rules\Rule;

/**
 * Add space after comma
 */
class AddSpaceAfterComma extends Rule
{
    public function handle(string $text): string
    {
        return preg_replace(
            '/([^,]+),(.*)/U',
            '\1, \2',
            $text
        );
    }
}
