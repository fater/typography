<?php

declare(strict_types=1);

namespace Fater\Typography;

use Fater\Typography\Rules\Rule;

class Typography
{
    /**
     * @param TypographyRules|null $rules
     */
    public function __construct(private ?TypographyRules $rules)
    {
        if ($this->rules === null) {
            $this->rules = new TypographyRules();
        }
    }

    /**
     * Make Typography instance using static call
     *
     * @param TypographyRules|null $rules
     *
     * @return static
     */
    public static function init(?TypographyRules $rules = null): static
    {
        return new static($rules);
    }

    /**
     * Format text with set rules
     *
     * @param string $text
     *
     * @return string
     */
    public function apply(string $text): string
    {
        foreach ($this->rules->getRules() as $rule) {
            $text = $this->runRule(new $rule(), $text);
        }

        return $text;
    }

    /**
     * @param Rule $handler
     * @param string $text
     *
     * @return string
     */
    protected function runRule(Rule $handler, string $text): string
    {
        return $handler->handle($text);
    }
}
