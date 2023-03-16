<?php

declare(strict_types=1);

namespace Fater\Typography\tests\Unit\Rules\Space;

use Fater\Typography\Src\Rules\Space\AddSpaceAfterComma;
use Fater\Typography\Tests\DataProviders\Rules\Space\AddSpaceBeforeCommaDataProvider;
use PHPUnit\Framework\TestCase;

class AddSpaceAfterCommaTest extends TestCase
{
    use AddSpaceBeforeCommaDataProvider;

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
