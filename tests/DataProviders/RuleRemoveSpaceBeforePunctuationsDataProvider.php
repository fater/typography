<?php

declare(strict_types=1);

namespace Typography\Tests\DataProviders;

trait RuleRemoveSpaceBeforePunctuationsDataProvider
{
    public function providerRule(): array
    {
        return [
            [
                'Lorem ipsum dolor sit amet . Paragraph 2 .',
                'Lorem ipsum dolor sit amet. Paragraph 2.',
            ],
            [
                'Hello , World',
                'Hello, World',
            ],
            [
                'Todo list :',
                'Todo list:',
            ],
            [
                'Hello World ;',
                'Hello World;',
            ],
            [
                'Hello World ?',
                'Hello World?',
            ],
            [
                'Hello World !',
                'Hello World!',
            ],
        ];
    }
}
