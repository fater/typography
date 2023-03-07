<?php

declare(strict_types=1);

namespace Typography\Tests;

use PHPUnit\Framework\TestCase;
use Typography\Tests\DataProviders\RuleRemoveSpaceBeforePunctuationsDataProvider;
use Typography\Src\Rules\RuleRemoveSpaceBeforePunctuation;

class RuleRemoveSpaceBeforePunctuationTest extends TestCase
{
    use RuleRemoveSpaceBeforePunctuationsDataProvider;

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
        $rule = new RuleRemoveSpaceBeforePunctuation();
        $result = $rule->handle($initialText);

        $this->assertEquals($expectedText, $result);
    }
}
