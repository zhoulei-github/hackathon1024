<?php

use \Illuminate\Support\Facades\Input;
use \Illuminate\Support\Facades\Response;

class ApiUserController extends ApiBaseController
{
    public function votelist()
    {
        $uid = Input::get('uid', '');
        if (empty($uid)) {
            return $this->json([]);
        }

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
}
