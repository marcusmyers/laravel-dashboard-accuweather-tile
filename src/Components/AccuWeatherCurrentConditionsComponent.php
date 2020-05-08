<?php

namespace MarcusMyers\AccuWeatherTile\Components;

use Livewire\Component;
use MarcusMyers\AccuWeatherTile\AccuWeatherStore;
use MarcusMyers\AccuWeatherTile\Services\AccuWeather;

class AccuWeatherCurrentConditionsComponent extends Component
{
    /** @var string */
    public $position;
    public $weatherConditions;

    public function mount(string $position)
    {
        $this->position = $position;
        $this->weatherConditions = AccuWeatherStore::make()->currentConditions();
    }

    public function render()
    {
        return view('dashboard-accuweather-tiles::current-conditions.tile');
    }
}
