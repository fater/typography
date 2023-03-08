<?php

declare(strict_types=1);

namespace Fater\Typography\Tests;

use Fater\Typography\Src\Rules\RuleAddSpaceAfterComma;
use Fater\Typography\Tests\DataProviders\RuleAddSpaceBeforeCommaDataProvider;
use PHPUnit\Framework\TestCase;

class RuleAddSpaceAfterCommaTest extends TestCase
{
    use RuleAddSpaceBeforeCommaDataProvider;

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
        $rule = new RuleAddSpaceAfterComma();
        $result = $rule->handle($initialText);

        $this->assertEquals($expectedText, $result);
    }
}
