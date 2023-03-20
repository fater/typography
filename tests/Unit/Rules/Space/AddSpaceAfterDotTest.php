<?php

declare(strict_types=1);

namespace Fater\Typography\tests\Unit\Rules\Space;

use Fater\Typography\Src\Rules\Space\AddSpaceAfterDot;
use Fater\Typography\Tests\DataProviders\Rules\Space\AddSpaceAfterDotDataProvider;
use PHPUnit\Framework\TestCase;

class AddSpaceAfterDotTest extends TestCase
{
    use AddSpaceAfterDotDataProvider;

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
        $rule = new AddSpaceAfterDot();
        $result = $rule->handle($initialText);

        $this->assertEquals($expectedText, $result);
    }
}
