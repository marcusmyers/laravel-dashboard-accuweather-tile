<?php

namespace MarcusMyers\AccuWeatherTile\Commands;

use Illuminate\Console\Command;
use MarcusMyers\AccuWeatherTile\AccuWeatherStore;
use MarcusMyers\AccuWeatherTile\Services\AccuWeather;

class FetchAccuWeatherCurrentConditionsCommand extends Command
{
    protected $signature = 'dashboard:fetch-accuweather-current-conditions';

    protected $description = 'Fetch AccuWeather current conditions';

    public function handle()
    {
        $this->info('Fetching AccuWeather Data...');

        AccuWeatherStore::make()->setCurrentConditions(
            AccuWeather::getCurrentConditions(
                config('dashboard.tiles.accuweather.location_key'),
                config('dashboard.tiles.accuweather.api_key')
            ));

        $this->info('All done!');
    }
}
