<?php

declare(strict_types=1);

namespace Fater\Typography\Src\Rules;

/**
 * Add apace after comma
 */
class RuleAddSpaceAfterComma extends Rule
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
