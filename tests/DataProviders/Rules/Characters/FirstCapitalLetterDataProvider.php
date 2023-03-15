<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\DataProviders\Rules\Characters;

trait FirstCapitalLetterDataProvider
{
    public function providerRule(): array
    {
        return [
            [
                '"typography" is a PHP software that automatically edits your text, places spaces and corrects'
                . ' mechanical errors in the text.  this service can be useful for people who are engaged in the '
                . 'production and formatting of texts for public purposes, such as web pages, promotional '
                . 'materials, presentations, resumes, news, public posts, etc.',
                '"Typography" is a PHP software that automatically edits your text, places spaces and corrects'
                . ' mechanical errors in the text.  This service can be useful for people who are engaged in the '
                . 'production and formatting of texts for public purposes, such as web pages, promotional '
                . 'materials, presentations, resumes, news, public posts, etc.',
            ],
            [
                'красота спасет мир',
                'Красота спасет мир',
            ],
        ];
    }
}
