<?php
use \Illuminate\Support\Facades\Input;

class UserController extends BaseController
{
    public function orders()
    {
        $uid = Input::get('uid', 1);

        $uservote = Uservote::with('film')->with('vote')->with('cinema')->where('user_id', '=', $uid);

        $list = $uservote->forPage(1, 20)->get()->toArray();

        //return \Illuminate\Support\Facades\Response::json($list);
        return View::make('myorder', ['list' => $list]);
    }

}
