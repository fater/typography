<?php

declare(strict_types=1);

namespace Fater\Typography;

use Fater\Typography\Rules\Rule;

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
        $startTime = microtime(true);
        $this->apply($text);
        $totalTime = $this->calculateExecutionTime($startTime);

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
        $startTime = microtime(true);
        $result = parent::runRule($handler, $text);
        $this->steps[$handler::class] = $this->calculateExecutionTime($startTime);

        return $result;
    }

    /**
     * @param float $startTime
     *
     * @return float
     */
    private function calculateExecutionTime(float $startTime): float
    {
        return round(microtime(true) - $startTime, 4);
    }
}
