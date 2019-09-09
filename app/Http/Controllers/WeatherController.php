<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class WeatherController extends Controller
{

    public function index($cityCode)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://api.openweathermap.org/data/2.5/weather?q=' . $cityCode . '&units=metric&appid=8c56e8eefbc22c8e1cb2d27336b8762a');
        $dataJson = $response->getBody()->getContents();
        $data = json_decode($dataJson);
        $main = $data->main;

        return view('list', compact('main'));
    }
}
