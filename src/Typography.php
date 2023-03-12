<?php

declare(strict_types=1);

namespace Fater\Typography\Src;

use Fater\Typography\Src\Rules\Rule;
use RuntimeException;

class Typography
{
    private array $handlers = [];

    /**
     * @return static
     */
    public static function init(): static
    {
        return new static();
    }

    /**
     * @param array $handlers
     *
     * @return $this
     */
    public function addHandlers(array $handlers): static
    {
        foreach ($handlers as $handler) {
            if (class_exists($handler) === false) {
                throw new RuntimeException("Class {$handler} not found");
            }

            if (is_subclass_of($handler, Rule::class) === false) {
                throw new RuntimeException("{$handler} isn't instance of Rule");
            }

            $this->handlers[] = $handler;
        }

        return $this;
    }

    /**
     * Apply rules
     *
     * @param string $text
     *
     * @return string
     */
    public function apply(string $text): string
    {
        foreach ($this->handlers as $handler) {
            $text = $this->runRule(new $handler(), $text);
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
