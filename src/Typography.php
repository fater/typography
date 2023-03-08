<?php

declare(strict_types=1);

namespace Fater\Typography\Src;

use Fater\Typography\Src\Rules\Rule;
use RuntimeException;

class Typography
{
    private array $handlers = [];
    private string $payload;

    public function __construct(string $payload)
    {
        $this->payload = $payload;
    }

    public static function init(string $payload): self
    {
        return new self($payload);
    }

    public function addHandlers(array $handlers): self
    {
        $this->handlers = array_merge($this->handlers, $handlers);

        return $this;
    }

    public function apply(): string
    {
        $payload = $this->payload;
        foreach ($this->handlers as $handler) {
            if (!class_exists($handler)) {
                throw new RuntimeException("Class {$handler} not found");
            }

            $rule = new $handler();
            if (!$rule instanceof Rule) {
                throw new RuntimeException("{$handler} isn't instance of Rule");
            }

            $payload = $rule->handle($payload);
        }

        return $payload;
    }
}
