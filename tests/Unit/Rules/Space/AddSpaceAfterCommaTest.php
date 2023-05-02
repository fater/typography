<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\Unit\Rules\Space;

use Fater\Typography\Rules\Space\AddSpaceAfterComma;
use Fater\Typography\Tests\DataProviders\Rules\Space\AddSpaceAfterCommaDataProvider;
use PHPUnit\Framework\TestCase;

class AddSpaceAfterCommaTest extends TestCase
{
    use AddSpaceAfterCommaDataProvider;

    /**
     * @dataProvider providerRule
     *
     * @param string $initialText
     * @param string $expectedText
     *
     * @return void
     */
    public function testRule(string $initialText, string $expectedText): void
    {
        $rule = new AddSpaceAfterComma();
        $result = $rule->handle($initialText);

        $this->assertEquals($expectedText, $result);
    }
}
