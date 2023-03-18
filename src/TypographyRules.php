<?php

declare(strict_types=1);

namespace Fater\Typography\Src;

use Fater\Typography\Src\Rules\Character\FirstCapitalLetter;
use Fater\Typography\Src\Rules\Character\ReplaceDash;
use Fater\Typography\Src\Rules\Character\ReplaceSpecialCharacters;
use Fater\Typography\Src\Rules\Rule;
use Fater\Typography\Src\Rules\Space\AddSpaceAfterComma;
use Fater\Typography\Src\Rules\Space\RemoveSpaceBeforePunctuation;
use Fater\Typography\Src\Rules\Space\RemoveSpaceInEachParagraph;
use RuntimeException;

final class TypographyRules
{
    /**
     * These rules are included by default
     */
    private array $rules = [
        // Character:
        FirstCapitalLetter::class,
        ReplaceDash::class,
        ReplaceSpecialCharacters::class,
        // Space:
        AddSpaceAfterComma::class,
        RemoveSpaceBeforePunctuation::class,
        RemoveSpaceInEachParagraph::class,
    ];

    /**
     * Make rules instance using static call
     *
     * @return static
     */
    public static function init(): self
    {
        return new self();
    }

    /**
     * Get list of available rules
     *
     * @return array
     */
    public function getRules(): array
    {
        return $this->rules;
    }

    /**
     * Add your own rules
     *
     * @param array $handlers
     *
     * @return $this
     */
    public function addRules(array $handlers): self
    {
        foreach ($handlers as $handler) {
            $this->checkRule($handler);
            $this->rules[] = $handler;
        }

        return $this;
    }

    public function clearAll(): self
    {
        $this->rules = [];

        return $this;
    }

    /**
     * @param array $handlers
     *
     * @return $this
     */
    public function removeRules(array $handlers): self
    {
        foreach ($handlers as $handler) {
            $this->checkRule($handler);
        }

        $this->rules = array_values(array_filter(
            array_values($this->rules),
            static fn ($rule) => !in_array($rule, $handlers, true)
        ));

        return $this;
    }

    /**
     * @param string $handler
     *
     * @return void
     *
     * @throws RuntimeException
     */
    private function checkRule(string $handler): void
    {
        if (class_exists($handler) === false) {
            throw new RuntimeException("Class {$handler} not found");
        }

        if (is_subclass_of($handler, Rule::class) === false) {
            throw new RuntimeException("{$handler} isn't instance of Rule");
        }
    }
}
