<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\DataProviders\Rules\Space;

trait RemoveSpaceBeforePunctuationDataProvider
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
