<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\Unit;

use Fater\Typography\TypographyDebug;
use Fater\Typography\TypographyRules;
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
