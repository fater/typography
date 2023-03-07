<?php

declare(strict_types=1);

namespace Typography\Src;

use RuntimeException;
use Typography\Src\Rules\Rule;

class Typography
{
    private array $handlers = [];
    private string $payload = '';

    public static function init(): self
    {
        return new self();
    }

    /**
     * @param array $handlers
     *
     * @return $this
     */
    public function addHandlers(array $handlers): self
    {
        $this->handlers = array_merge($this->handlers, $handlers);

        return $this;
    }

    /**
     * @param string $payload
     *
     * @return $this
     */
    public function setText(string $payload): self
    {
        $this->payload = $payload;

        return $this;
    }

    /**
     * @return string
     */
    public function apply(): string
    {
        $payload = $this->payload;
        foreach ($this->handlers as $handler) {
            if (!class_exists($handler)) {
                throw new RuntimeException("Class $handler not found");
            }

            $rule = new $handler;
            if (!$rule instanceof Rule) {
                throw new RuntimeException("$handler isn't instance of Rule");
            }

            $payload = $rule->handle($payload);
        }

        return $payload;
    }
}
