<?php

namespace App\Jobs;

use App\Http\Utility\Weather;
use App\Models\Weather as ModelsWeather;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class FetchWeather implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $now= Carbon::now();
        $weather_data = Weather::fetchWeather($now);
        ModelsWeather::updateOrCreate([
            'date' => $now->toDateString(),
        ],
        $weather_data
        );
    }
}
