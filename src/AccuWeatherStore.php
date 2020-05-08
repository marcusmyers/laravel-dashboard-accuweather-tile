<?php

namespace MarcusMyers\AccuWeatherTile;

use Spatie\Dashboard\Models\Tile;

class AccuWeatherStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName("accuweather");
    }

    public function setCurrentConditions(array $currentConditions) : self
    {
        $this->tile->putData('accuweather:current_conditions', $currentConditions);

        return $this;
    }

    public function currentConditions()
    {
        return $this->tile->getData('accuweather:current_conditions') ?? [];
    }

    public function setForecasts(array $forecasts): self
    {
        $this->tile->putData('accuweather:forecasts', $forecasts);

        return $this;
    }

    public function forecasts()
    {
        return $this->tile->getData('accuweather:forecasts') ?? [];
    }

    public function setData(array $data): self
    {
        $this->tile->putData('key', $data);

        return $this;
    }

    public function getData(): array
    {
        return$this->tile->getData('key') ?? [];
    }
}
