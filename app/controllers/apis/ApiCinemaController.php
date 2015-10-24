<?php

class ApiCinemaController extends ApiBaseController
{
    public function get()
    {
        $id = Input::get('id', 0);

        if (!$id) {
            return $this->jsonError(400, 'ID无效');
        }

        $film = Cinema::find($id);
        if (!$film) {
            return $this->jsonError(404, '影院未找到');
        }

        return $this->json($film->toArray());
    }

    public function pageList()
    {
        $name = Input::get('name', '');
        $page = Input::get('page', 1);
        $pageSize = Input::get('page_size', 20);

        $cinema = Cinema::where('id', '>', 0);

        if ($name) {
            $cinema = $cinema->where('name', 'like', "%{$name}%");
        }

        $count = $cinema->count();
        if (!$count) {
            return $this->json([]);
        }

        $listData = $cinema->forPage($page, $pageSize)
            ->get()
            ->toArray();

        $listData = [
            'count' => $count,
            'list' => $listData,
        ];

        return $this->json($listData);
    }
}
