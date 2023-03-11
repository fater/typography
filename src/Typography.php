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

    public function apply(): string
    {
        $payload = $this->payload;
        foreach ($this->handlers as $handler) {
            $payload = (new $handler())->handle($payload);
        }

        return $payload;
    }
}
