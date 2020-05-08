<?php

namespace MarcusMyers\AccuWeatherTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use MarcusMyers\AccuWeatherTile\Commands\FetchAccuWeatherCurrentConditionsCommand;
use MarcusMyers\AccuWeatherTile\Commands\FetchAccuWeatherFiveDayForecastCommand;
use MarcusMyers\AccuWeatherTile\Components\AccuWeatherCurrentConditionsComponent;
use MarcusMyers\AccuWeatherTile\Components\AccuWeatherFiveDayForecastComponent;

class AccuWeatherServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchAccuWeatherCurrentConditionsCommand::class,
                FetchAccuWeatherFiveDayForecastCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-accuweather-tiles'),
        ], 'dashboard-accuweather-tiles');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-accuweather-tiles');

        Livewire::component('accuweather-current-conditions-tile', AccuWeatherCurrentConditionsComponent::class);
        Livewire::component('accuweather-five-day-forecast-tile', AccuWeatherFiveDayForecastComponent::class);
    }
}
