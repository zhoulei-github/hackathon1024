<?php

class HomeController extends BaseController
{
    public function index()
    {
        $name = Input::get('name', '');

        $film = Film::where('id', '>', 0);

        if ($name) {
            $film = $film->where('name', 'like', "%{$name}%");
        }

        $defaultColumn = ['id', 'name', 'desc', 'pic_url'];
        $filmData = $film->forPage(1, 30)
            ->get($defaultColumn);

        return View::make('index', array('filmData' => $filmData, 'name' => $name));
    }

    public function login()
    {
        return View::make('login');
    }

    public function reg()
    {
        return View::make('reg');
    }

    public function forget()
    {
        return View::make('forget_password');
    }

}
