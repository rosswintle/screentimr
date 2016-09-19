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
}
