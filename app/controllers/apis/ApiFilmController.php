<?php

class ApiFilmController extends ApiBaseController
{
    public function get()
    {
        $id = Input::get('id', 0);

        if (!$id) {
            return $this->jsonError(400, 'ID无效');
        }

        $film = Film::find($id);
        return $this->json($film->toArray());
    }

    public function pageList()
    {
        $name = Input::get('name', '');
        $page = Input::get('page', 1);
        $pageSize = Input::get('page_size', 20);

        $film = Film::where('id', '>', 0);

        if ($name) {
            $film = $film->where('name', 'like', "%{$name}%");
        }

        $count = $film->count();
        if (!$count) {
            return $this->json([]);
        }

        $listData = $film->forPage($page, $pageSize)
            ->get()
            ->toArray();

        $listData = [
            'count' => $count,
            'list' => $listData,
        ];

        return $this->json($listData);
    }
}
