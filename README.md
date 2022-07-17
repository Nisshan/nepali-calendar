# It converts date from english to nepali and vice-versa

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nisshan/nepali-calendar.svg?style=flat-square)](https://packagist.org/packages/nisshan/nepali-calendar)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/nisshan/nepali-calendar/run-tests?label=tests)](https://github.com/nisshan/nepali-calendar/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/nisshan/nepali-calendar/Check%20&%20fix%20styling?label=code%20style)](https://github.com/nisshan/nepali-calendar/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/nisshan/nepali-calendar.svg?style=flat-square)](https://packagist.org/packages/nisshan/nepali-calendar)

This is a laravel package that converts English date to Nepali and vice versa.

## Installation

You can install the package via composer:

```bash
composer require nisshan/nepali-calendar
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="nepali-calendar-config"
```

This is the contents of the published config file:

```php
return [
    'date-format' => 'Y m, d is default format',
    
    'nepali-dates' => 'array of nepali dates'
];
```

## Usage

```php
toNepaliDate('2022-1-17'); => '2078 10, 03'

toNepaliDate('2022-1-17', 'Y, m d, D'); => '2078, 10 03, Monday'
```

to convert to Nepali Date from English and

```php
toEnglishDate('2078-10-03'); => '2022 1, 17'

toEnglishDate('2078-10-03', 'Y, m d, D'); => '2022, 1 17, Monday'
```

to convert to English from Nepali date. 
The date Format parameter is optional which format the date if not passed will be used from configuration file. 
The above two implements shows how you can pass the english date to the function with or without a separator that
changes helps in separating the date using Helper file or you can also convert the date as

```php

use Nisshan\NepaliCalendar\DateConversion;

$nepaliDate = DateConversion::convert('2022-1-17')->toNepali();
$nepaliDateWithFormat = DateConversion::convert('2022-1-17','Y, m d, D')->toNepali();


$englishDate = DateConversion::convert('2078-10-03')->toNepali();
$englishWithFormat = DateConversion::convert('2078-10-03','Y, m d, D')->toNepali();

```
It will give same output as helper function.

## Format that you can use

currently, I have used ['Y','M','D','d','m','y'] as date formatter you can use any combination of the following to output formatted date.


```php

  'Y','y'  => 'Year',
  'M'      => 'Month Name',
  'm'      => 'month'
  'D'      => 'Name of Week Day',
  'd'      => 'date',

```

## Thank you note

If you are here by any chance and using my package I would like to thank you and would love to accept  PR on improvement of code or new features. Thank you.

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [nisshan](https://github.com/Nisshan)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
