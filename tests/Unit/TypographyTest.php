<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\Unit;

use Fater\Typography\Typography;
use PHPUnit\Framework\TestCase;

class TypographyTest extends TestCase
{
    public function testDebug(): void
    {
        $result = Typography::init()
            ->apply('Neque porro quisquam,est qui dolorem ipsum, domain.com quia dolor sit amet,velit...');

        $this->assertEquals(
            'Neque porro quisquam, est qui dolorem ipsum, domain.com quia dolor sit amet, velit…',
            $result
        );
    }
}
