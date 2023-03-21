<?php

declare(strict_types=1);

namespace Fater\Typography\tests\Unit\Rules\Characters;

use Fater\Typography\Rules\Character\ReplaceSpecialCharacters;
use PHPUnit\Framework\TestCase;

class ReplaceSpecialCharactersTest extends TestCase
{
    public function providerRule(): array
    {
        return [
            [
                '(c) (r) (tm) +- <-brand-> ...',
                '© ® ™ ± ←brand→ …',
            ]
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
        $rule = new ReplaceSpecialCharacters();
        $result = $rule->handle($initialText);

        $this->assertEquals($expectedText, $result);
    }
}
