<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\DataProviders\Rules\Space;

trait AddSpaceBeforeCommaDataProvider
{
    public function providerRule(): array
    {
        return [
            [
                'Neque porro quisquam,est qui dolorem ipsum quia dolor sit amet,consectetur,adipisci velit...',
                'Neque porro quisquam, est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...',
            ],
        ];
    }
}
