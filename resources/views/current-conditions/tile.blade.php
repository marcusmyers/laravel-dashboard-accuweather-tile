<x-dashboard-tile :position="$position">
    <div class="grid gap-2 justify-items-center h-full text-center" style="grid-template-rows: auto 1fr auto;" x-data="clock()" x-init="tick">
        <h1 class="font-medium text-dimmed text-sm uppercase tracking-wide tabular-nums" x-text="date"></h1>

        <div class="self-center font-bold text-4xl tracking-wide leading-none" x-text="time"></div>

        <div wire:poll.600s class="uppercase">
            <div class="flex w-full justify-center space-x-4 items-center">
                <span>
                    {{ $weatherConditions['Temperature']['Imperial']['Value'] }}°
                    <br>
                    <span class="text-sm uppercase text-dimmed">{{ $weatherConditions['WeatherText'] }} </span>
                </span>

                <span><img src="https://www.accuweather.com/images/weathericons/{{ $weatherConditions['WeatherIcon'] }}.svg" class="h-16 w-16"></span>
            </div>
        </div>
    </div>

    <script>
        function clock() {
            return {
                dateTime: new Date(),

                tick() {
                    setInterval(() => {
                        this.dateTime = new Date();
                    }, 1000);
                },
                get date() {
                    const day = this.dateTime
                        .toLocaleDateString('{{ app()->getLocale() }}', {
                            weekday: 'long'
                        })
                        .substr(0, 3);
                    const date = [
                        this.dateTime.getMonth() + 1,
                        this.dateTime.getDate(),
                    ].map(this.padNumber).join('/');
                    return `${day} ${date}`;
                },
                get time() {
                    return this.dateTime.toLocaleString('en-US', {
                        hour: 'numeric',
                        minute: 'numeric',
                        hour12: true
                    });
                },
                padNumber(number) {
                    return String(number).padStart(2, '0');
                }
            }
        }
    </script>
</x-dashboard-tile>