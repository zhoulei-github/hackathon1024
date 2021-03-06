<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Vote extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'votes';

    public function cinema()
    {
        return $this->belongsTo('cinema');
    }

    public function film()
    {
        return $this->belongsTo('film');
    }
}
