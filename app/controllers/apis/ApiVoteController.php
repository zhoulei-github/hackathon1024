<?php

use \Illuminate\Support\Facades\Input;
use \Illuminate\Support\Facades\Response;

class ApiVoteController extends ApiBaseController
{
    public function pageListByFilmId()
    {
        $filmId = Input::get('film_id', '');
        if (empty($filmId)) {
            return Response::json([]);
        }

        $page = Input::get('page', 1);
        $pageSize = Input::get('page_size', 20);

        $vote = Vote::with('cinema');

        $vote = $vote->where('film_id', '=', "{$filmId}");
        $vote = $vote->where('status', '=', 0);

        $vote = $vote->forPage($page, $pageSize)->get();

        $voteData = $vote->toArray();

        foreach($voteData as $k=>$v) {
            $voteData[$k]['cinema']['distance'] = rand(100, 2000);
        }

        $rt = [
            'list' => $voteData,
            'count' => $vote->count()
        ];

        return $this->json($rt);
    }
}
