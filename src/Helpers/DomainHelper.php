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
        preg_match('/^(https?:\/\/)?(www.)?([^\/]+)(.*)$/', $url, $matches);
        if (!isset($matches)) {
            return false;
        }

        $sections = array_reverse(explode('.', $matches[3]));
        $countSections = count($sections);
        if ($countSections < 2) {
            return false;
        }

        // Check found top domain zone in list of available domains and reverse array
        if (!array_key_exists($sections[0], DomainDictionary::TOP_LEVEL_DOMAIN_ZONES)) {
            return false;
        }

        for ($i = 1; $i < $countSections; $i++) {
            if (str_starts_with($sections[$i], '-') || str_ends_with($sections[$i], '-')) {
                return false;
            }
        }

        return true;
    }
}
