<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timer extends Model
{
    protected $fillable = ['time'];

    protected $attributes = [
        'time' => 0,
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function userDecrement( $seconds ) {
        if ($this->time > $seconds) {
            $this->time -= $seconds;
        } else {
            $this->time = 0;

        }
        $this->save();
        return $this;
    }

    public function userIncrement( $seconds ) {
        $this->time += $seconds;
        $this->save();
        return $this;
    }

}
