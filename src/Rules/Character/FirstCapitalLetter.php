<?php

declare(strict_types=1);

namespace Fater\Typography\Src\Rules\Character;

use Fater\Typography\Src\Rules\Rule;

/**
 * First capital letter
 */
class FirstCapitalLetter extends Rule
{
    public function handle(string $text): string
    {
        return preg_replace_callback(
            '/([^.]*.)/',
            static function ($matches) {
                return preg_replace_callback(
                    '/([\w\p{Cyrillic}])/u',
                    static fn ($matchesFirstLetter) => mb_strtoupper($matchesFirstLetter[0]),
                    $matches[0],
                    1
                );
            },
            $text
        );
    }
}
