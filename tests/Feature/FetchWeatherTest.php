<?php

namespace Tests\Feature;

use App\Http\Utility\Weather;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FetchWeatherTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = Weather::fetchWeather(Carbon::now());
        print_r($response);
        $this->assertTrue(is_array($response));
    }
}
