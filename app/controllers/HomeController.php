<?php

class HomeController extends BaseController
{
    public function index()
    {
    	$film = Film::where('id', '>', 0);

        $defaultColumn = ['id', 'name', 'desc', 'pic_url'];
        $filmData = $film->forPage(1, 10)
			             ->get($defaultColumn);

        return View::make('index', array('filmData' => $filmData));
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
