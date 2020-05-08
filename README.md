# A tile to display weather using AccuWeather API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marcusmyers/laravel-dashboard-accuweather-tile.svg?style=flat-square)](https://packagist.org/packages/marcusmyers/laravel-dashboard-accuweather-tile)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/marcusmyers/laravel-dashboard-accuweather-tile/run-tests?label=tests)](https://github.com/marcusmyers/laravel-dashboard-accuweather-tile/actions?query=workflow%3Arun-tests+branch%3Amaster)
[![Total Downloads](https://img.shields.io/packagist/dt/marcusmyers/laravel-dashboard-accuweather-tile.svg?style=flat-square)](https://packagist.org/packages/marcusmyers/laravel-dashboard-accuweather-tile)

Much like Spatie's [laravel-dashboard-time-weather-tile](https://github.com/spatie/laravel-dashboard-time-weather-tile), but uses AccuWeather.

This tile can be used on [the Laravel Dashboard]https://docs.spatie.be/laravel-dashboard).

## Installation

You can install the package via composer:

```bash
composer require marcusmyers/laravel-dashboard-accuweather-tile
```

## Usage

In your dashboard view you can use the `livewire:accuweather-current-conditions-tile` component or the `livewire:accuweather-five-day-forecast-tile`.

```html
<x-dashboard>
    <livewire:accuweather-current-conditions-tile position="e1:e4" />
    <livewire:accuweather-five-day-forecast-tile position="a14:d16" />
</x-dashboard>
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email :author_email instead of using the issue tracker.

## Credits

- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
