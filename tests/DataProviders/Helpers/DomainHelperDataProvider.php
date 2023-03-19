<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\DataProviders\Helpers;

trait DomainHelperDataProvider
{
    public function providerValid(): array
    {
        return [
            ['domain.com'],
            ['sub.domain.com'],
            ['sub2.sub1.sub.domain.com'],
            ['domain.com/help.html'],
            ['domain.com/long/url/file.php?data=value&data2=value2'],

            ['http://domain.com'],
            ['http://sub1.domain.com'],
            ['http://sub.sub.domain.com'],
            ['http://domain.com/faq.htm'],
            ['http://domain.com/user/profile'],

            ['http://www.domain.com/downdloads/'],

            ['https://domain.com'],
            ['https://www.domain.com'],
            ['https://sub.domain.com'],
            ['https://sub2.sub.domain.com'],
            ['https://sub2.sub.domain.com/longest/url/profile?id=6783&lng=jp'],
        ];
    }
}
