<?php

namespace App\Http\Controllers;
use Session;
use DB;
use Carbon\Carbon;
use Validator, Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller{
    //



    private function convertTemperature($temperature)
    {
        return round(($temperature - 273.15), 0);
    }



    public function index(){


       
              $data1 = "Weather";
              $data2 = "Weather";
              $description = "About Weather";


                $API_KEY = 'f00c38e0279b7bc85480c3fe775d518c';
                $city = 'Targu-Mures';
                $url = 'https://api.openweathermap.org/data/2.5/forecast?q=' . $city . '&appid=' . $API_KEY;
        
            
                $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            $temp = $this->convertTemperature($data['list'][0]['main']['temp']);
            $humidity = $data['list'][0]['main']['humidity'];
            $wind = round($data['list'][0]['wind']['speed'], 2);
            $clouds = round($data['list'][0]['clouds']['all'], 2);
            $pressure = round($data['list'][0]['main']['pressure'], 2);
            $weather = $data['list'][0]['weather'][0]['main'];
            $weatherDescription = $data['list'][0]['weather'][0]['description'];
            $country = $data['city']['country'];
            $icon = $data['list'][0]['weather'][0]['icon'];
            $iconUrl = 'http://openweathermap.org/img/w/' . $icon . '.png';

            $days = [6, 13, 21, 29]; // Indices for the next 4 days
            for ($i = 0; $i < 4; $i++) {
                ${"day{$i}Temp"} = $this->convertTemperature($data['list'][$days[$i]]['main']['temp']);
                ${"icon{$i}"} = $data['list'][$days[$i]]['weather'][0]['icon'];
                ${"icon{$i}Url"} = 'http://openweathermap.org/img/w/' . ${"icon{$i}"} . '.png';
            }
        
        

                
            
      return view('weather.index',compact('city', 'country', 'temp', 'humidity', 'wind', 'clouds', 'pressure', 'weather', 'weatherDescription'))->with("title", $data1)->with("subtitle", $data2)->with("description", $description);

        }        
                

    }


    public function search(Request $request)
    {
        
        $API_KEY= 'f00c38e0279b7bc85480c3fe775d518c';

        if ($request->input('city') == '') {
            return redirect()->route('weather')->with('error', 'Please enter a city name.');
        }

        $city = $request->input('city');
        $url = 'https://api.openweathermap.org/data/2.5/forecast?q=' . $city . '&appid=' . $API_KEY;

        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();

            $temp = $this->convertTemperature($data['list'][0]['main']['temp']);
            $humidity = $data['list'][0]['main']['humidity'];
            $wind = round($data['list'][0]['wind']['speed'], 2);
            $clouds = round($data['list'][0]['clouds']['all'], 2);
            $pressure = round($data['list'][0]['main']['pressure'], 2);
            $weather = $data['list'][0]['weather'][0]['main'];
            $weatherDescription = $data['list'][0]['weather'][0]['description'];
            $country = $data['city']['country'];
            $icon = $data['list'][0]['weather'][0]['icon'];
            $iconUrl = 'http://openweathermap.org/img/w/' . $icon . '.png';

            $days = [6, 13, 21, 29]; // Indices for the next 4 days
            for ($i = 0; $i < 4; $i++) {
                ${"day{$i}Temp"} = $this->convertTemperature($data['list'][$days[$i]]['main']['temp']);
                ${"icon{$i}"} = $data['list'][$days[$i]]['weather'][0]['icon'];
                ${"icon{$i}Url"} = 'http://openweathermap.org/img/w/' . ${"icon{$i}"} . '.png';
            }

            return view('weather.result', compact('city', 'country', 'temp', 'humidity', 'wind', 'clouds', 'pressure', 'weather', 'weatherDescription', 'iconUrl', 'day0Temp', 'day1Temp', 'day2Temp', 'day3Temp', 'icon0Url', 'icon1Url', 'icon2Url', 'icon3Url'));
        } else {
            return redirect()->route('weather')->with('error', 'Failed to fetch weather data.');
        }
    }

    

    
}
