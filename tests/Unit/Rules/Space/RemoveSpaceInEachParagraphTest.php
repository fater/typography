<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\Unit\Rules\Space;

use Fater\Typography\Rules\Space\RemoveSpaceInEachParagraph;
use Fater\Typography\Tests\DataProviders\Rules\Space\RemoveSpaceInEachParagraphDataProvider;
use PHPUnit\Framework\TestCase;

class RemoveSpaceInEachParagraphTest extends TestCase
{
    use RemoveSpaceInEachParagraphDataProvider;

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
        $rule = new RemoveSpaceInEachParagraph();
        $result = $rule->handle($initialText);

        $this->assertEquals($expectedText, $result);
    }
}
