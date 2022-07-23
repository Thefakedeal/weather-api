<?php

namespace App\Http\Utility;

use Carbon\Carbon;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class Weather
{

    public static function getWeather(Carbon $dateTime, $lat, $lng):Response {
        $dateTimeUnix =  $dateTime->timestamp;
        $query = [
            'lat' => $lat,
            'lng' => $lng,
            'params'=> 'airTemperature,cloudCover,humidity,windSpeed',
            'start' => $dateTimeUnix
        ];
        $response = Http::withHeaders([
            'Authorization' => config('services.weather_api.key'),
        ])->get(config('services.weather_api.url'), $query);

        return $response;
    }

    public static function fetchWeather(Carbon $dateTime){
        $places = [
            'new_york' => [
                'lat' => '40.730610',
                'lng' => '-73.935242'
            ],
            'london' => [
                'lat' => '51.503399',
                'lng' => '-0.119519'
            ],
            'paris' => [
                'lat' => '48.867374',
                'lng' => '2.784018'
            ],
            'berlin' => [
                'lat' => '52.531677',
                'lng' => '13.381777'
            ],
            'tokyo' => [
                'lat' => '35.652832',
                'lng' => '139.839478'
            ],
        ];
        $weathers = [];
        foreach ($places as $key => $value) {
            $response = Weather::getWeather($dateTime,$value['lat'],$value['lng']);
            $weathers[$key] = $response->object()->hours;
        }
        return $weathers;
    }
}
