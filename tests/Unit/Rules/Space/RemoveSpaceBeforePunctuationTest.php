<?php

declare(strict_types=1);

namespace Fater\Typography\tests\Unit\Rules\Space;

use Fater\Typography\Rules\Space\RemoveSpaceBeforePunctuation;
use Fater\Typography\Tests\DataProviders\Rules\Space\RemoveSpaceBeforePunctuationDataProvider;
use PHPUnit\Framework\TestCase;

class RemoveSpaceBeforePunctuationTest extends TestCase
{
    use RemoveSpaceBeforePunctuationDataProvider;

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
