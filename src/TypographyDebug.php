<?php

declare(strict_types=1);

namespace Fater\Typography\Src;

use Fater\Typography\Src\Rules\Rule;

class TypographyDebug extends Typography
{
    private array $steps = [];

    /**
     * @param string $text
     *
     * @return array
     */
    public function debugApply(string $text): array
    {
        $startTime = microtime(true) * 1000;
        $this->apply($text);
        $totalTime = floor((microtime(true) * 1000) - $startTime);

        return array_merge($this->steps, ['total' => $totalTime]);
    }

    /**
     * @param Rule $handler
     * @param string $text
     *
     * @return string
     */
    protected function runRule(Rule $handler, string $text): string
    {
        $startTime = microtime(true) * 1000;
        $result = parent::runRule($handler, $text);
        $this->steps[get_class($handler)] = floor((microtime(true) * 1000) - $startTime);

        return $result;
    }
}
