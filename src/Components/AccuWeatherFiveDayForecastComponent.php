<?php

namespace MarcusMyers\AccuWeatherTile\Components;

use Livewire\Component;
use MarcusMyers\AccuWeatherTile\AccuWeatherStore;
use MarcusMyers\AccuWeatherTile\Services\AccuWeather;

class AccuWeatherFiveDayForecastComponent extends Component
{
    /** @var string */
    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }

    public function render()
    {
        return view('dashboard-accuweather-tiles::five-day-forecast.tile', [
          'refreshIntervalInSeconds' => config('dashboard.tiles.accuweather.refresh_interval_in_seconds') ?? 60,
          'forecasts' => AccuWeatherStore::make()->forecasts(),
        ]);
    }
}
