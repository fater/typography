<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\Unit\Helpers;

use Fater\Typography\Src\Helpers\DomainHelper;
use Fater\Typography\Tests\DataProviders\Helpers\DomainHelperDataProvider;
use PHPUnit\Framework\TestCase;

class DomainHelperTest extends TestCase
{
    use DomainHelperDataProvider;

    /**
     * @dataProvider providerValid
     *
     * @param string $url
     *
     * @return void
     */
    public function testIsValidDomainSuccess(string $url): void
    {
        $this->assertTrue(DomainHelper::isValidDomain($url));
    }

    /**
     * @dataProvider providerInvalid
     *
     * @param string $url
     *
     * @return void
     */
    public function testInvalidDomainSuccess(string $url): void
    {
        $this->assertFalse(DomainHelper::isValidDomain($url));
    }
}
