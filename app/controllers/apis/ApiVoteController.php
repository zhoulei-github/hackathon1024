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

        $vote = Vote::where('id', '>', 0);

        if ($filmId) {
            $vote = $vote->where('id', '=', "{$filmId}");
        }

        $vote = $vote->forPage($page, $pageSize)->get();


        $voteData = [
            'list' => $vote->toArray(),
            'count' => $vote->count()
        ];

        return $this->json($voteData);
    }
}
