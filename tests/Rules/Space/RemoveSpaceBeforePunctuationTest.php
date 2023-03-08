<?php

declare(strict_types=1);

namespace Typography\tests\Rules\Space;

use Fater\Typography\Src\Rules\Space\RemoveSpaceBeforePunctuation;
use Fater\Typography\Tests\DataProviders\Rules\Space\RemoveSpaceBeforePunctuationsDataProvider;
use PHPUnit\Framework\TestCase;

class RemoveSpaceBeforePunctuationTest extends TestCase
{
    use RemoveSpaceBeforePunctuationsDataProvider;

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
        $rule = new RemoveSpaceBeforePunctuation();
        $result = $rule->handle($initialText);

        $this->assertEquals($expectedText, $result);
    }
}
