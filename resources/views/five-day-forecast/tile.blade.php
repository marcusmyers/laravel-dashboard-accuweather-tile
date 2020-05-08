<x-dashboard-tile :position="$position">
    <div class="w-full h-full">
        <h1 class="font-medium text-dimmed text-sm uppercase tracking-wide tabular-nums">Forecast</h1>

        <div class="flex justify-between h-full">
            @foreach($forecasts['DailyForecasts'] as $forecast)
            <div class="p-2">
                <h1 class="font-medium text-dimmed text-sm uppercase text-center tracking-wide tabular-nums">{{ date('m/d', strtotime($forecast['Date'])) }}</h1>
                <div class="flex w-full justify-center space-x-4 items-center">
                    <span>
                        {{ $forecast['Temperature']['Maximum']['Value'] }}°
                    </span>

                    <span><img src="https://www.accuweather.com/images/weathericons/{{ $forecast['Day']['Icon'] }}.svg" class="h-8 w-8"></span>
                </div>
                <span class="text-xs uppercase text-dimmed">{{ $forecast['Day']['IconPhrase'] }} </span>
            </div>
            @endforeach
        </div>
    </div>
</x-dashboard-tile>