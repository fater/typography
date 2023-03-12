<?php

declare(strict_types=1);

namespace Fater\Typography\Tests;

use Fater\Typography\Src\Rules\Space\AddSpaceAfterComma;
use Fater\Typography\Src\Rules\Space\RemoveSpaceBeforePunctuation;
use Fater\Typography\Src\Rules\Space\RemoveSpaceInEachParagraph;
use Fater\Typography\Src\TypographyDebug;
use PHPUnit\Framework\TestCase;

class TypographyDebugTest extends TestCase
{
    public function testDebug(): void
    {
        $result = TypographyDebug::init()
            ->addHandlers([
                AddSpaceAfterComma::class,
                RemoveSpaceBeforePunctuation::class,
                RemoveSpaceInEachParagraph::class,
            ])
            ->debugApply('Neque porro quisquam,est qui dolorem ipsum quia dolor sit amet, velit...');

        $this->assertArrayHasKey(AddSpaceAfterComma::class, $result);
        $this->assertArrayHasKey(RemoveSpaceBeforePunctuation::class, $result);
        $this->assertArrayHasKey(RemoveSpaceInEachParagraph::class, $result);
        $this->assertArrayHasKey('total', $result);
    }
}
