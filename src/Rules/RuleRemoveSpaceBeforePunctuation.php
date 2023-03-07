<?php

declare(strict_types=1);

namespace Typography\Src\Rules;

/**
 * Удаление пробела перед:
 *  - точкой
 *  - запятой
 *  - двоеточием
 *  - точкой с запятой
 *  - вопросом
 *  - восклицательным знаком
 */
class RuleRemoveSpaceBeforePunctuation extends Rule
{
    public function handle(string $text): string
    {
        return preg_replace(
            '/((\040|\t|&nbsp;)+)([.,:;?!]+)(\s+|$)/',
            '\3\4',
            $text
        );
    }
}
