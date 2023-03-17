<?php

declare(strict_types=1);

namespace Fater\Typography\tests\Unit;

use Fater\Typography\Src\TypographyDebug;
use Fater\Typography\Src\TypographyRules;
use PHPUnit\Framework\TestCase;

class TypographyDebugTest extends TestCase
{
    public function testDebug(): void
    {
        $result = TypographyDebug::init()
            ->debugApply('Neque porro quisquam,est qui dolorem ipsum quia dolor sit amet, velit...');

        foreach (TypographyRules::init()->getRules() as $ruleName) {
            $this->assertArrayHasKey($ruleName, $result);
        }
        $this->assertArrayHasKey('total', $result);
    }
}
