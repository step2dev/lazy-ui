<div x-data="{
        title: '{{ $title ?? str_replace('_', ' ', $timezone) }}',
        timestamp: '{{ $timestamp->format('H:i:s') }}',
        weekday: '{{ $timestamp->isoFormat('dddd') }}',
        dayDate: '{{ $timestamp->isoFormat('DD MMMM') }}',
        hour: '{{ $timestamp->format('H:i:s') }}',
        dayString: '{{ $timestamp->isoFormat('ddd') }}'
    }" x-init="
        const formatter = new Intl.DateTimeFormat('uk-UA',  {
            weekday: 'long',
            year: '2-digit',
            month: 'long',
            day: '2-digit',
            hour: '2-digit', minute: '2-digit', second: '2-digit',
            timeZone: '{{ $timezone }}',
            timeZoneName: 'short'
        });

        setInterval(() => {
            const startingDate = new Date();
            const dateInNewTimezone = formatter.format(startingDate).split(', ');
            const dateParts = dateInNewTimezone[1].split(' ');

            weekday = dateInNewTimezone[0].trim();
            dayDate = dateParts[0] + ' ' +  dateParts[1];
            hour = dateParts[5];
        }, 1000);
    ">
    <div class="grid h-full justify-items-center gap-2 pb-2 pt-2 text-center">
        <div class="text-secondary text-sm font-medium uppercase tabular-nums tracking-wide" x-text="title"></div>
        <div class="self-center text-4xl font-bold leading-none tracking-wide" x-text="hour"></div>
        <div class="text-dimmed text-sm uppercase" x-text="weekday + ', ' + dayDate"></div>
    </div>
</div>
