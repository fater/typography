<?php

declare(strict_types=1);

namespace Typography\Tests;

use PHPUnit\Framework\TestCase;
use RuntimeException;
use Typography\Src\Typography;

class TypographyTest extends TestCase
{
    public function testApplyClassExistsFailed(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Class invalidRuleClassName not found');

        Typography::init()
            ->addHandlers(['invalidRuleClassName'])
            ->apply();
    }

    public function testApplyClassImplementsFailed(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Typography\Tests\TypographyTest isn\'t instance of Rule');

        Typography::init()
            ->addHandlers([self::class])
            ->apply();
    }
}
