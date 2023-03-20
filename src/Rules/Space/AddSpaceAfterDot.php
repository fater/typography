<?php

declare(strict_types=1);

namespace Fater\Typography\Src\Rules\Space;

use Fater\Typography\Src\Helpers\DomainHelper;
use Fater\Typography\Src\Rules\Rule;

/**
 * Add space after dot
 * - check for url`s in valid domains
 */
class AddSpaceAfterDot extends Rule
{
    public function handle(string $text): string
    {
        return preg_replace_callback(
            '/([^ \n]+)\.([^ \n\.]+)/u',
            function ($matches) {
                if (DomainHelper::isValidDomain($matches[0])) {
                    return $matches[0];
                }

                return $this->handle($matches[1]) . '. ' . $matches[2];
            },
            $text
        );
    }
}
