# It converts date from english to nepali and vice-versa

[![Latest Version on Packagist](https://img.shields.io/packagist/v/nisshan/nepali-calendar.svg?style=flat-square)](https://packagist.org/packages/nisshan/nepali-calendar)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/nisshan/nepali-calendar/run-tests?label=tests)](https://github.com/nisshan/nepali-calendar/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/nisshan/nepali-calendar/Check%20&%20fix%20styling?label=code%20style)](https://github.com/nisshan/nepali-calendar/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/nisshan/nepali-calendar.svg?style=flat-square)](https://packagist.org/packages/nisshan/nepali-calendar)

This is a laravel package that converts English date to Nepali and vice versa.

#Note : This Package will only work for php

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
    'date-separator' => 'symbol used to separate date - by default',
    
    'nepali-dates' => 'array of nepali dates'
];
```




## Usage

```php
toNepaliDate(year: $year, month: $month, day: $day); => 'Year-Month-Day'
```

to convert to Nepali Date from English and

```php
toEnglishDate(year: $year, month: $month, day: $day, separator: '/'); => 'Year/Month/Day'
```

to convert to English from Nepali date. 
The separator parameter is optional which format the date if not passed will be used from configuration file. 


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
