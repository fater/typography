<?php

declare(strict_types=1);

namespace Fater\Typography\tests\Unit;

use Fater\Typography\Src\TypographyRules;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class TypographyRulesTest extends TestCase
{
    private TypographyRules $typographyRules;

    public function testAddRulesExistsFailed(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Class invalidRuleClassName not found');

        $this->typographyRules->addRules(['invalidRuleClassName']);
    }

    public function testAddRulesImplementsFailed(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(self::class . ' isn\'t instance of Rule');

        $this->typographyRules->addRules([self::class]);
    }

    public function testGetRulesSuccess(): void
    {
        $result = $this->typographyRules->getRules();

        $this->assertIsArray($result);
    }

    public function testInitInstanceOfTypographyRulesClassSuccess(): void
    {
        $this->assertInstanceOf(TypographyRules::class, $this->typographyRules);
    }

    public function setUp(): void
    {
        parent::setUp();

        $this->typographyRules = TypographyRules::init();
    }
}
