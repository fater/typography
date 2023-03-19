<?php

declare(strict_types=1);

namespace Fater\Typography\Src\Helpers;

use Fater\Typography\Src\Dictionaries\DomainDictionary;

class DomainHelper
{
    /**
     * Detects url for contains valid domain
     *
     * @param string $url
     *
     * @return bool
     */
    public static function isValidDomain(string $url): bool
    {
        preg_match('/((https?:\/\/)?(www.)?)[\w-]+(\.)([^\s\/]{2,})([^\s]*)/U', $url, $matches);
        if (!isset($matches)) {
            return false;
        }

        // Check found top domain zone in list of available domains
        preg_match('/[^.]\w+$/U', $matches[5], $topLevelMatches);
        if (
            !isset($topLevelMatches)
            || !array_key_exists($topLevelMatches[0], DomainDictionary::TOP_LEVEL_DOMAIN_ZONES)
        ) {
            return false;
        }

        return true;
    }
}
