<?php

use \Illuminate\Support\Facades\Input;

class FilmController extends BaseController
{
    public function detail($id)
    {
        $film = Film::find($id)->toArray();

        $vote = Vote::with('cinema');
        $vote = $vote->where('film_id', '=', "{$id}");
        $vote = $vote->where('status', '=', 0);

        $vote = $vote->forPage(1, 20)->get();
        $voteData = $vote->toArray();
        foreach ($voteData as $k => $v) {
            $voteData[$k]['show_time'] = date('m/d H:i', strtotime($v['show_time']));
            $voteData[$k]['cinema']['distance'] = $this->getDistance(119.998089, 30.38812, $v['cinema']['location_x'], $v['cinema']['location_y']);
        }
        return View::make('movieDetail', ['film' => $film, 'list' => $voteData]);
    }

    private function getDistance($lat1, $lng1, $lat2, $lng2)
    {
        $earthRadius = 6367000; //approximate radius of earth in meters

        /*
          Convert these degrees to radians
          to work with the formula
        */

        $lat1 = ($lat1 * pi() ) / 180;
        $lng1 = ($lng1 * pi() ) / 180;

        $lat2 = ($lat2 * pi() ) / 180;
        $lng2 = ($lng2 * pi() ) / 180;

        /*
          Using the
          Haversine formula

          http://en.wikipedia.org/wiki/Haversine_formula

          calculate the distance
        */

        $calcLongitude = $lng2 - $lng1;
        $calcLatitude = $lat2 - $lat1;
        $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);  $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
        $calculatedDistance = $earthRadius * $stepTwo;

        return round($calculatedDistance);
    }

}
