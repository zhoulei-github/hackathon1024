<?php

use \Illuminate\Support\Facades\Input;
use \Illuminate\Support\Facades\Response;

class ApiUserController extends ApiBaseController
{
    public function votelist()
    {
        $uid = Input::get('uid', 1);

        $page = Input::get('page', 1);
        $pageSize = Input::get('page_size', 20);

        $uservote = Uservote::with('film')->where('user_id', '=', $uid);

        $list = $uservote->forPage($page, $pageSize)->get()
            ->toArray();

        $rt = [
            'count' => $uservote->count(),
            'list' => $list,
        ];
        return $this->json($rt);
    }

    public function vote()
    {
        $data['user_id'] = Input::get('uid', 1);
        $data['vote_id'] = Input::get('vote_id');
        $data['vote_count'] = Input::get('vote_count', 1);
        $data['film_id'] = Vote::whereid($data['vote_id'])->pluck('film_id');
        $data['cinema_id'] = Vote::whereid($data['vote_id'])->pluck('cinema_id');
        $data['is_payed'] = Input::get('is_payed', 1);
        $data['created_time'] = date('Y-m-d H:i:s');
        Uservote::insert($data);

        Vote::where('id', '=', $data['vote_id'])->increment('current_people', $data['vote_count']);

        return $this->json([]);
    }

}
