<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    protected $fillable = ['time', 'limit'];

    protected $attributes = [
        'time' => 0,
        'limit' => 0,
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function userDecrement( User $user ) {
        if ($this->time > $user->settings->timer_decrement) {
            $this->time -= $user->settings->timer_decrement;
        } else {
            $this->time = 0;
        }
        $this->save();
        return $this;
    }

    public function userIncrement( User $user ) {
        if ($this->time + $user->settings->timer_increment > $user->settings->default_limit) {
            $this->time = $user->settings->default_limit;
        } else {
            $this->time += $user->settings->timer_increment;
        }
        $this->save();
        return $this;
    }

}
