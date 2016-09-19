<?php

namespace App\Http\Controllers;

use App\Timer;
use App\UserSetting;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class TimerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = Auth::user();
        if ($user->timer)
        {
            $timer = $user->timer;
        }
        else
        {
            $timer = new Timer;
            $timer->user_id = $user->id;
            $timer->save();
        }
        if ($user->userSetting)
        {
            $userSetting = $user->userSetting;
        }
        else
        {
            $userSetting = new UserSetting;
            $userSetting->user_id = $user->id;
            $userSetting->save();
        }
        return view('timer', [
                'timer' => $timer->time,
                'decrement' => $userSetting->timer_decrement,
                'increment' => $userSetting->timer_increment,
            ] );
    }
}
