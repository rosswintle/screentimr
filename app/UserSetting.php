<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSetting extends Model
{

    protected $fillable = [
        'timer_increment',
        'timer_decrement',
    ];

    protected $attributes = [
        'timer_increment' => 0,
        'timer_decrement' => 0,
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
