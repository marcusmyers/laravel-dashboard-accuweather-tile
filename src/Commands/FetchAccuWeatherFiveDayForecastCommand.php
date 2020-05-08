<?php

namespace MarcusMyers\AccuWeatherTile\Commands;

use Illuminate\Console\Command;
use MarcusMyers\AccuWeatherTile\AccuWeatherStore;
use MarcusMyers\AccuWeatherTile\Services\AccuWeather;

class FetchAccuWeatherFiveDayForecastCommand extends Command
{
    protected $signature = 'dashboard:fetch-accuweather-five-day-forecast';

    protected $description = 'Fetch AccuWeather 5 day forecast';

    public function handle()
    {
        $this->info('Fetching AccuWeather Data...');

        AccuWeatherStore::make()->setForecasts(
            AccuWeather::getFiveDayForcast(
                config('dashboard.tiles.accuweather.location_key'),
                config('dashboard.tiles.accuweather.api_key')
            )
        );

        $this->info('All done!');
    }
}
