<?php

declare(strict_types=1);

namespace Fater\Typography\Tests\DataProviders\Rules\Space;

trait RemoveSpaceInEachParagraphDataProvider
{
    public function providerRule(): array
    {
        return [
            [
                '   <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem '
                . 'accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae'
                . ' ab illo inventore veritatis et quasi architecto sunt explicabo.</p>    ' . PHP_EOL
                . '   <p>Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit</p>   ' . PHP_EOL
                . PHP_EOL . '   ' . PHP_EOL . PHP_EOL,
                '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem '
                . 'accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae'
                . ' ab illo inventore veritatis et quasi architecto sunt explicabo.</p>' . PHP_EOL
                . '<p>Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit</p>' . PHP_EOL
                . PHP_EOL . PHP_EOL . PHP_EOL,
            ],
        ];
    }
}
