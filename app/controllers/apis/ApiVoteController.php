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

        foreach ($voteData as $k => $v) {
            $voteData[$k]['cinema']['distance'] = rand(100, 2000);
        }

        $rt = [
            'list' => $voteData,
            'count' => $vote->count()
        ];

        return $this->json($rt);
    }

    /**
     * 添加测试数据
     */
    public function addVotes()
    {
        set_time_limit(0);
        $films = Film::where('id', '>', 0)->get()->toArray();
        $cinemas = [79,80,81,82,83,84,86,87,90,94,95,98,99,100,101,102,103,104,105,106,108,110,111,114,115,116,117,118,120,121,123,124,125,127,128,129,130,131,132,133,134,135,137,138,139,145,146,150,151,152];
        foreach ($films as $film) {
            $num = rand(0, 8);
            $vote = [];
            $vote['film_id'] = $film['id'];
            $vote['status'] = 0;

            for ($i = 0; $i < $num; $i++) {
                $vote['cinema_id'] = $cinemas[rand(1, 49)];
                $vote['price'] = rand(1, 9) . '0';
                $vote['show_time'] = date('Y-m-d H:i:s', time() + rand(3, 10) * 3600 * 24);
                $vote['deadline'] = date('Y-m-d H:i:s', strtotime($vote['show_time'])-3600*24);
                $vote['min_people'] = rand(3,6) . '0';
                $vote['max_people'] = 60;
                $vote['current_people'] = rand(0, 60);
                $vote['updated_at'] = date('Y-m-d H:i:s');
                Vote::insert($vote);
                echo '加一条<br>';
            }

        }

        return $this->json($films);
    }
}
