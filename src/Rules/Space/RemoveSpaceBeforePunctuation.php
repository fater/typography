<?php

declare(strict_types=1);

namespace Fater\Typography\Src\Rules\Space;

use Fater\Typography\Src\Rules\Rule;

/**
 * Remove spaces before punctuations:
 *  - dot
 *  - comma
 *  - colon
 *  - semicolon
 *  - question mark
 *  - exclamation mark
 */
class RemoveSpaceBeforePunctuation extends Rule
{
    public function handle(string $text): string
    {
        return preg_replace(
            '/((\040|\t|&nbsp;)+)([.,:;?!]+)(\s+|$)/',
            '\3\4',
            $text
        );
    }
}
