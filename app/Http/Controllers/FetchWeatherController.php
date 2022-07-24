<?php

namespace App\Http\Controllers;

use App\Http\Utility\Weather as UtilityWeather;
use App\Models\Weather;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FetchWeatherController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'date' => 'required|date'
        ]);
        $date = Carbon::parse($request->date);
        $weather = Weather::where('date',$date->toDateString())->first();
        if($weather) return response()->json(['data'=>$weather]);
        $weather_data = UtilityWeather::fetchWeather($date);
        $weather_data['date'] = $date->toDateString();
        $new_weather = Weather::create($weather_data);
        return response()->json(['data'=>$new_weather]);
    }
}
