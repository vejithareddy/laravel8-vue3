<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class AccommodationController extends Controller
{
   
    public function index(Request $request)
    {
        $apiKey = env('ATDW_API_KEY');
        $query = $request->getQueryString();
        $url = 'https://atlas.atdw-online.com.au/api/atlas/states?key='. $apiKey .'&'. $query .'&out=json';
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);
        $result = json_decode(mb_convert_encoding($response->getBody() , 'UTF-8' , 'UTF-16LE'));
        return response()
            ->json($result);
    }

    public function getAreas(Request $request)
    {
        $apiKey = env('ATDW_API_KEY');
        $query =   'NSW';
        $url = 'https://atlas.atdw-online.com.au/api/atlas/areas?key='. $apiKey .'& st='. $query .'&out=json';
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $url);
        $result = json_decode(mb_convert_encoding($response->getBody() , 'UTF-8' , 'UTF-16LE'));
        return response()
            ->json($result);
    }

    
}
