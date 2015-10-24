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
            $voteData[$k]['cinema']['distance'] = rand(100, 2000);
        }
        return View::make('movieDetail', ['film' => $film, 'list' => $voteData]);
    }

}
