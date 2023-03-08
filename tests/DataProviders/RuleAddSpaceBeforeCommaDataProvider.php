<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\DataProviders;

trait RuleAddSpaceBeforeCommaDataProvider
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
