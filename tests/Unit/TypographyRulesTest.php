<?php

declare(strict_types=1);

namespace Fater\Typography\tests\Unit;

use Fater\Typography\TypographyRules;
use PHPUnit\Framework\TestCase;
use RuntimeException;

class TypographyRulesTest extends TestCase
{
    private TypographyRules $typographyRules;

    //<editor-fold desc="method: addRules()">
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
    //</editor-fold>

    //<editor-fold desc="method: getRules">
    public function testGetRulesSuccess(): void
    {
        $result = $this->typographyRules->getRules();

        $this->assertIsArray($result);
    }
    //</editor-fold>

    //<editor-fold desc="method: clearAll()">
    public function testClearAllSuccess(): void
    {
        $result = $this->typographyRules->clearAll()->getRules();

        $this->assertEquals([], $result);
    }
    //</editor-fold>

    //<editor-fold desc="method: removeRules()">
    public function testRemoveRulesExistsFailed(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Class invalidRuleClassName not found');

        $this->typographyRules->removeRules(['invalidRuleClassName']);
    }

    public function testRemoveRulesImplementsFailed(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage(self::class . ' isn\'t instance of Rule');

        $this->typographyRules->removeRules([self::class]);
    }

    public function testRemoveRulesSuccess(): void
    {
        $rules = $this->typographyRules->getRules();

        $removedRule1 = $rules[0];
        unset($rules[0]); // Remove first rule
        $rules = array_values($rules); // Convert associative to non-associative array
        $removedRule2 = $rules[0];
        unset($rules[0]); // Remove second rule
        $rules = array_values($rules); // Convert associative to non-associative array
        $remainingRules = $this->typographyRules
            ->removeRules([$removedRule1, $removedRule2])
            ->getRules();

        // Checking both rules have been deleted
        $this->assertArrayNotHasKey($removedRule1, $remainingRules);
        $this->assertArrayNotHasKey($removedRule2, $remainingRules);

        // Checking remain rules are in the list
        foreach ($rules as $rule) {
            $this->assertContains($rule, $remainingRules, $rule);
        }
    }
    //</editor-fold>

    public function setUp(): void
    {
        parent::setUp();

        $this->typographyRules = TypographyRules::init();
    }
}
