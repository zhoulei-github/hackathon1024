<?php

use \Illuminate\Http\Response;
use \Illuminate\Support\Facades\Input;

class ApiFilmController extends BaseController
{
    public function pageList()
    {
        $name = Input::get('name', '');
        $page = Input::get('page', 1);
        $pageSize = Input::get('page_size', 20);

        $film = Film::where(1);

        if ($name) {
            $film = $film->where('name', 'like', "%{$name}%");
        }

        $film = $film->forPage($page, $pageSize);

        $filmData = $film->toArray();

        return Response::json($filmData);
    }
}
