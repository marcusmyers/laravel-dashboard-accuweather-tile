# A tile to display weather using AccuWeather API

[![Latest Version on Packagist](https://img.shields.io/packagist/v/marcusmyers/laravel-dashboard-accuweather-tile.svg?style=flat-square)](https://packagist.org/packages/marcusmyers/laravel-dashboard-accuweather-tile)
[![Total Downloads](https://img.shields.io/packagist/dt/marcusmyers/laravel-dashboard-accuweather-tile.svg?style=flat-square)](https://packagist.org/packages/marcusmyers/laravel-dashboard-accuweather-tile)

Much like Spatie's [laravel-dashboard-time-weather-tile](https://github.com/spatie/laravel-dashboard-time-weather-tile), but uses AccuWeather.

This tile can be used on [the Laravel Dashboard](https://docs.spatie.be/laravel-dashboard).

## Installation

You can install the package via composer:

```bash
composer require marcusmyers/laravel-dashboard-accuweather-tile
```

## Usage

In the `dashboard` config file, you must add this configuration in the `tiles` key.

Sign up at https://developer.accuweather.com/ to obtain `ACCUWEAHTER_API_KEY` and you can find your location key by searching for you city at https://www.accuweather.com.  The resulting url should have your location key, i.e. https://www.accuweather.com/en/us/chicago/60608/weather-forecast/348308, the Chicago location key is 348308. AccuWeather only allows you 50 API request a day for a free account.

The data can be displayed as either Imperial (Farenheit) or Metric (Celsis). This will affect information displayed on the daily tile and forecast tiles.

It is also possible to change the date format of the tiles. Valid formats are m/d or d/m.

```php
// in config/dashboard.php

return [
    // ...
    'tiles' => [
        'accuweather' => [
            'location_key' => '12345',
            'api_key' => env('ACCUWEATHER_API_KEY'),
            'system' => 'Metric',
            'date_format' => 'd/m',
        ]
    ],
];
```

In `app\Console\Kernel.php` you should schedule the `MarcusMyers\AccuWeatherTile\Commands\FetchAccuWeatherCurrentConditionsCommand` to run every hour.

If you want to use the forecast you can optionally schedule the `MarcusMyers\AccuWeatherTile\Commands\FetchAccuWeatherFiveDayForecastCommand` to run daily.

```php
// in app/console/Kernel.php

protected function schedule(Schedule $schedule)
{
    // ...
    $schedule->command(MarcusMyers\AccuWeatherTile\Commands\FetchAccuWeatherCurrentConditionsCommand::class)->hourly();
    $schedule->command(MarcusMyers\AccuWeatherTile\Commands\FetchAccuWeatherFiveDayForecastCommand::class)->daily();
}
```

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
