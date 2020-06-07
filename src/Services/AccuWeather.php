<?php

namespace MarcusMyers\AccuWeatherTile\Services;

use Illuminate\Support\Facades\Http;

class AccuWeather
{
    const API_URL = 'https://dataservice.accuweather.com';

    public static function getCurrentConditions(string $locationKey, string $apiKey) : array
    {
        $endpoint = self::API_URL."/currentconditions/v1/{$locationKey}?apikey={$apiKey}";

        return Http::get($endpoint)->json()[0];
    }

    public static function getFiveDayForcast(string $locationKey, string $apiKey)
    {
        $endpoint = self::API_URL . "/forecasts/v1/daily/5day/{$locationKey}?apikey={$apiKey}&metric=" . self::getMetricUrlValue();

        return Http::get($endpoint)->json();
    }

    public static function getMetricUrlValue()
    {
        if (config('dashboard.tiles.accuweather.system') == 'Metric') {
            return 'true';
        } else {
            return 'false';
        }
    }
}