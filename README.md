# Make your text tidier with PHP Typography

![GitHub Workflow Status](https://img.shields.io/github/actions/workflow/status/fater/typography/run-test.yml)
![GitHub tag (latest by date)](https://img.shields.io/github/v/tag/fater/typography)
![GitHub release](https://img.shields.io/github/v/release/fater/typography?display_name=release)
![GitHub code size in bytes](https://img.shields.io/github/languages/code-size/fater/typography)
![GitHub](https://img.shields.io/github/license/fater/typography)
[![PHP Version Require](http://poser.pugx.org/fater/typography/require/php)](https://packagist.org/packages/fater/typography)

"Typography" is a PHP software that automatically format your text, places spaces and corrects mechanical errors in the text. This software can be useful for people who are engaged in the production and formatting of texts for public purposes, such as web pages, promotional materials, presentations, resumes, news, public posts, etc.

Using the "Typography" allows you to significantly reduce the time for correcting and formatting the text, since the service automatically processes all the necessary actions. In addition, "Typography" guarantees high accuracy and quality of correction, which helps to avoid punctuation errors.

This can be especially useful for professional writers, journalists, advertisers and other people whose work is related to text content.

# Table Of Contents

- [Requirements](#requirements)
- [Installation](#installation)
- [Usage](#usage)
- [Roadmap](#roadmap)
- [Changelog](#changelog)
- [License](#license)

# Requirements

- PHP 8.0 or higher

# Installation

Install with composer:

```shell
composer install fater/typography
```

# Usage

To run "Typography" with default formatting rules, use this code example:
```php
<?php

use Fater\Typography\Src\Typography;

$formattedText = Typography::init()->apply('Your text');

echo $formattedText;
```

## Create your own formatting rule

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
## Add your rule to default formatting rules

Add your rule to the list of handlers to use it:
```php
<?php

use Fater\Typography\Src\TypographyRules;

$rules = TypographyRules::init()->addRules([YourOwnRule::class]);

// Text will be formatted with default list of rules including your rule
$formattedText = Typography::init($rules) // Set rules instance with your rule
    ->apply('Hello');
```

## if you want to use only your rule

At the beginning clear all rules list, add your rule to the list of handlers to use it:
```php
<?php

use Fater\Typography\Src\TypographyRules;

$rules = TypographyRules::init()
    ->clearAll()
    ->addRules([YourOwnRule::class]);

// Text will be formatted only with your rule
$formattedText = Typography::init($rules) // Set rules instance with your rule
    ->apply('Hello');

echo $formattedText;
```

The above example will output:
```
Hello World!
```

## Roadmap

- Space:
  - [x] Add space after comma
  - [x] Add space after dot (ignore domains) TODO: emails/IP
  - [x] Remove space before punctuation (.,:;?!)
  - [x] Remove space in each paragraph
  - [ ] Remove redundant line breaks
- Characters:
  - [x] Replace special characters (c), (r), (tm), +-, ..., <-, -> 
  - [x] Replace dash
  - [X] First letter in uppercase

# Changelog

Read [Changelog in releases list](https://github.com/fater/typography/releases) to know all product changes.

# License

License MIT, see more details in [LICENSE](LICENSE)
