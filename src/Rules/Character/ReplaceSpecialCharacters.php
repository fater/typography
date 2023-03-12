<?php

declare(strict_types=1);

namespace Fater\Typography\Src\Rules\Character;

use Fater\Typography\Src\Rules\Rule;

/**
 * Replace special characters
 */
class ReplaceSpecialCharacters extends Rule
{
    private const CHARACTERS = [
        '(c)' => '©',
        '(r)' => '®',
        '(tm)' => '™',
        '+-' => '±',
    ];

    public function handle(string $text): string
    {
        $charactersInRegularExpression = quotemeta(implode('|', array_keys(self::CHARACTERS)));

        return preg_replace_callback(
            "/({$charactersInRegularExpression})/",
            static fn ($matches) => self::CHARACTERS[$matches[1]],
            $text
        );
    }
}
