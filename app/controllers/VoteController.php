<?php
use \Illuminate\Support\Facades\Input;

class VoteController extends BaseController
{
    public function select()
    {
        $uid = 1;
        $voteId = Input::get('vote_id', 0);
        $vote =  Vote::with('cinema')->with('film');
        $voteInfo = $vote->find($voteId)->toArray();
        $voteInfo['show_time'] = date('m/d H:i', strtotime($voteInfo['show_time']));

        return View::make('seat', ['voteinfo' => $voteInfo]);
    }

}
