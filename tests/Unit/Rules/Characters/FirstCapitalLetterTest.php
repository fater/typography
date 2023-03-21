<?php

declare(strict_types=1);

namespace Fater\Typography\tests\Unit\Rules\Characters;

use Fater\Typography\Rules\Character\FirstCapitalLetter;
use Fater\Typography\Tests\DataProviders\Rules\Characters\FirstCapitalLetterDataProvider;
use PHPUnit\Framework\TestCase;

class FirstCapitalLetterTest extends TestCase
{
    use FirstCapitalLetterDataProvider;

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
        $rule = new FirstCapitalLetter();
        $result = $rule->handle($initialText);

        $this->assertEquals($expectedText, $result);
    }
}
