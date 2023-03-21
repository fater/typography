<?php

declare(strict_types=1);

namespace Fater\Typography\Src\Rules\Character;

use Fater\Typography\Src\Helpers\DomainHelper;
use Fater\Typography\Src\Rules\Rule;

/**
 * First capital letter
 *
 * Algorithm:
 * - Separate each line with the template '. '
 * - If the first word a valid domain/url,
 *      will return non changed string
 *      else convert the first letter to uppercase
 */
class FirstCapitalLetter extends Rule
{
    public function handle(string $text): string
    {
        return implode('', array_map(
            static function ($string) {
                if (str_starts_with($string, '.')) {
                    return $string;
                }

                preg_match('/^ *([^ ]*)/', $string, $matches);
                if (DomainHelper::isValidDomain($matches[1])) {
                    return $string;
                }

                return preg_replace_callback(
                    '/([\w\p{Cyrillic}])/u',
                    static fn ($matchesFirstLetter) => mb_strtoupper($matchesFirstLetter[0]),
                    $string,
                    1
                );
            },
            preg_split('/(\. )/', $text, -1, PREG_SPLIT_DELIM_CAPTURE)
        ));
    }
}
