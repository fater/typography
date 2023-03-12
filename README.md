# Make your text tidier with - PHP Typography

![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/fater/typography/run-test.yml)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/fater/typography)
![GitHub](https://img.shields.io/github/license/fater/typography)

"Typography" is a PHP software that automatically edits your text, places spaces and corrects mechanical errors in the text. This service can be useful for people who are engaged in the production and formatting of texts for public purposes, such as web pages, promotional materials, presentations, resumes, news, public posts, etc.

Using the "Typography" allows you to significantly reduce the time for correcting and formatting the text, since the service automatically processes all the necessary actions. In addition, "Typography" guarantees high accuracy and quality of correction, which helps to avoid punctuation errors.

This can be especially useful for professional writers, journalists, advertisers and other people whose work is related to text content.

## Table Of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Changelog](#changelog)
- [License](#license)

## Requirements

- PHP 8.0 or higher

## Installation

Install with composer:

```shell
composer install fater/typography
```

## Usage

To run "Typography" with default correction rules, use this code example:
```php
<?php

use Fater\Typography\Src\Typography;

$formattedText = Typography::init()->apply('Your text');

echo $formattedText;
```

## Use your own formatting rules

If you want to make special formatting rules you can make class from base rule template:
```php
<?php

use Fater\Typography\Src\Rules\Rule;

class YourOwnRule extends Rule
{
    public function handle(string $text): string
    {
        // Your code modification rules
        $text .= ' World!';
        
        // Return formatted text
        return $text;
    }
}
```

Add your rule to the list of handlers to use it:
```php
<?php

use Fater\Typography\Src\Typography;

$formattedText = Typography::init()
    ->addHandlers([YourOwnRule::class])
    ->apply('Hello');

echo $formattedText;
```

The above example will output:
```
Hello World!
```

## Roadmap

Current version is 0.2.0.

The software version is still **under development**.

### Status of rules:

- Space:
  - [x] Add space after comma
  - [x] Remove space before punctuation (.,:;?!)
  - [x] Remove space in each paragraph
- Letters:
  - [ ] First letter in uppercase

## Changelog

Read [CHANGELOG](CHANGELOG.md) to know all product changes.

## License

License MIT, see more details in [LICENSE](LICENSE)
