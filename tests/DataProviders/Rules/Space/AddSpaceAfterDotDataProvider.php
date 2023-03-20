<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\DataProviders\Rules\Space;

trait AddSpaceAfterDotDataProvider
{
    public function providerRule(): array
    {
        return [
            [
                'Valid domain - https://domain.com/bbb/fff.and invalid.domain 1sub.domain.invalid',
                'Valid domain - https://domain.com/bbb/fff.and invalid. domain 1sub. domain. invalid',
            ],
        ];
    }
}
