<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\DataProviders\Helpers;

trait DomainHelperDataProvider
{
    public function providerValid(): array
    {
        return [
            ['domain5.com'],
            ['sub.domain.t.com'],
            ['sub-2.sub1.sub.dom-ain.com'],
            ['domain.com/help-center.html'],
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

    public function providerInvalid(): array
    {
        return [
            ['-domain.com'],
            ['sub-.domain.t.com'],
            ['domain.invalid'],
            ['htp://domain.com'],
        ];
    }
}
