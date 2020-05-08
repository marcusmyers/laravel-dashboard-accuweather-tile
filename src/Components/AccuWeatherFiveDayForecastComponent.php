<?php

namespace MarcusMyers\AccuWeatherTile\Components;

use Livewire\Component;
use MarcusMyers\AccuWeatherTile\AccuWeatherStore;
use MarcusMyers\AccuWeatherTile\Services\AccuWeather;

class AccuWeatherFiveDayForecastComponent extends Component
{
    /** @var string */
    public $position;
    public $forecasts;

    public function mount(string $position)
    {
        $this->position = $position;
        $this->forecasts = AccuWeatherStore::make()->forecasts();
    }

    public function render()
    {
        return view('dashboard-accuweather-tiles::five-day-forecast.tile');
    }
}
