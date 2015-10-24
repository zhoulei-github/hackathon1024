<?php
use \Illuminate\Support\Facades\Input;

class VoteController extends BaseController
{
    public function select()
    {
        $uid = 1;
        $voteId = Input::get('vote_id', 3);
        $vote =  Vote::with('cinema');
        $voteInfo = $vote->find($voteId)->toArray();

        return View::make('seat');
    }

}
