<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{

    protected $fillable = [
        'timer_increment',
        'timer_decrement',
        'default_time',
        'default_limit',
    ];

    protected $attributes = [
        'timer_increment' => 300,
        'timer_decrement' => 300,
        'default_time' => 3600,
        'default_limit' => 3600,
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
