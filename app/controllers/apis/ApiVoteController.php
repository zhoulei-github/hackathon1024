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
        ob_start();
        $films = Film::where('id', '>', 0)->get()->toArray();
        foreach ($films as $film) {
            $num = rand(0, 10);
            $vote = [];
            $vote['film_id'] = $film['id'];
            $vote['price'] = rand(1, 9) . '0';
            $vote['show_time'] = date('Y-m-d H:i:s', time() + rand(3, 10) * 3600 * 24);
            $vote['deadline'] = date('Y-m-d H:i:s', strtotime($vote['show_time'])-3600*24);
            $vote['min_people'] = rand(7,9) . '0';
            $vote['max_people'] = 100;
            $vote['status'] = 0;
            $vote['current_people'] = rand(0, 100);

            for ($i = 0; $i < $num; $i++) {
                $vote['cinema_id'] = rand(79, 152);
                Vote::insert($vote);
                echo '加一条<br>';
                ob_flush();
                flush();
            }

        }

        return $this->json($films);
    }
}
