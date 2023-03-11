<?php

declare(strict_types=1);

namespace Fater\Typography\Src\Rules\Space;

use Fater\Typography\Src\Rules\Rule;

/**
 * Remove space in the end and beginning of each paragraph
 */
class RemoveSpaceInEachParagraph extends Rule
{
    public function handle(string $text): string
    {
        return preg_replace_callback(
            '|(.*[^\n])|',
            static fn ($matches) => trim($matches[1]),
            $text
        );
    }
}
