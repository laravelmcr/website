<?php

namespace App\Http\Controllers;

use Cache;
use Carbon\Carbon;
use GuzGuzzleHttpzle\Exception\GuzzleException;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {

      if (!Cache::has('next-meetup')) {

        // Grab events from Meetup API
        $client = new Client();
        $response = $client->get('https://api.meetup.com/laravel-mcr/events', [
              'query' => ['key' => env('MEETUP_API_KEY'),
              'page' => 1]
          ]);

        $meetup = json_decode($response->getBody(), true);
        if($meetup) {
            $meetup = $meetup[0];
            // Store what we need in cache
            $toCache = [];

            $toCache['date'] = Carbon::createFromFormat('Y-m-d', $meetup['local_date']);
            $toCache['time'] = Carbon::createFromFormat('H:m', $meetup['local_time']);
            $toCache['location'] = $meetup['venue']['name'];
            $toCache['link'] = $meetup['link'];

            Cache::forever('next-meetup', $toCache);
        }

      }


      $nextMeetup = Cache::get('next-meetup');

      return view('welcome', compact('nextMeetup'));


    }
}
