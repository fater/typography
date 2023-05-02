<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\Unit\Rules\Characters;

use Fater\Typography\Rules\Character\ReplaceDash;
use PHPUnit\Framework\TestCase;

class ReplaceDashTest extends TestCase
{
    public function providerRule(): array
    {
        return [
            [
                'sub - brand',
                'sub — brand',
            ],
            [
                'sub&nbsp;-&nbsp;brand',
                'sub&nbsp;—&nbsp;brand',
            ],
            [
                'between -7 and',
                'between -7 and',
            ],
            [
                '<img alt="super -&nbsp;user" src="."> - rules',
                '<img alt="super —&nbsp;user" src="."> — rules',
            ],
        ];
    }

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
        $rule = new ReplaceDash();
        $result = $rule->handle($initialText);

        $this->assertEquals($expectedText, $result);
    }
}
