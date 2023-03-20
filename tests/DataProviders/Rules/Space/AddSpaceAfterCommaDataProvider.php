<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\DataProviders\Rules\Space;

trait AddSpaceAfterCommaDataProvider
{
    public function providerRule(): array
    {
        return [
            // Add space after comma if no space
            [
                'Neque porro quisquam,est qui dolorem',
                'Neque porro quisquam, est qui dolorem',
            ],
            // Add space after each comma
            [
                'Neque porro quisquam,est qui dolorem ipsum quia dolor,sit amet,consectetur,adipisci velit...',
                'Neque porro quisquam, est qui dolorem ipsum quia dolor, sit amet, consectetur, adipisci velit...',
            ],
            // No add space after comma if space contain
            [
                'Neque porro quisquam, est qui dolorem ipsum quia dolor, sit amet, consectetur, adipisci velit...',
                'Neque porro quisquam, est qui dolorem ipsum quia dolor, sit amet, consectetur, adipisci velit...',
            ],
        ];
    }
}
