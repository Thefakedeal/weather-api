<?php

namespace Tests\Feature;

use App\Http\Utility\Weather;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class WeatherApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = Weather::getWeather(Carbon::now(),'40.730610','-73.935242');
        $this->assertTrue($response->ok());
    }
}
