<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Uservote extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_vote';

    public function film()
    {
        return $this->belongsTo('film');
    }

    public function vote(){
        return $this->belongsTo('vote');
    }

}
