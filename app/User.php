<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function timers() {
        return $this->hasMany('App\Timer');
    }

    public function settings() {
        return $this->hasOne('App\UserSetting');
    }

    public function getTodaysTimerAttribute() {
        $today = new Carbon();
        $today = $today->startOfDay()->toDateTimeString();
        return $this->timers()->where('created_at', '>', $today)->first();
    }

}
