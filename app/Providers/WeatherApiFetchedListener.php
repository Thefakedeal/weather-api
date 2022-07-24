<?php

namespace App\Providers;

use App\Providers\WeatherApiFetched;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class WeatherApiFetchedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Providers\WeatherApiFetched  $event
     * @return void
     */
    public function handle(WeatherApiFetched $event)
    {
        Log::info("Api fetched");
    }
}
