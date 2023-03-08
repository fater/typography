<?php

declare(strict_types=1);

namespace Fater\Typography\Tests;

use Fater\Typography\Src\Typography;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class TypographyTest extends TestCase
{
    public function testApplyClassExistsFailed(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Class invalidRuleClassName not found');

        Typography::init('')
            ->addHandlers(['invalidRuleClassName'])
            ->apply();
    }

    public function testApplyClassImplementsFailed(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(self::class . ' isn\'t instance of Rule');

        Typography::init('')
            ->addHandlers([self::class])
            ->apply();
    }
}
