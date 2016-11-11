<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{

    protected $fillable = [
        'timer_increment',
        'timer_decrement',
        'default_time',
    ];

    protected $attributes = [
        'timer_increment' => 5,
        'timer_decrement' => 5,
        'default_time' => 3600,
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
