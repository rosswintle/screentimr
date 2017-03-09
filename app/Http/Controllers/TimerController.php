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

        if ($user->settings)
        {
            $userSettings = $user->settings;
        }
        else
        {
            $userSettings = new UserSetting;
            $userSettings->user_id = $user->id;
            $userSettings->save();
        }

        $timer = $user->todays_timer;
        if (!$timer)
        {
            $timer = new Timer;
            $timer->user_id = $user->id;
            $timer->time = $userSettings->default_time;
            $timer->limit = $userSettings->default_limit;
            $timer->save();
        }
        return view('timer', [
                'timerId' => $timer->id,
                'timer' => $timer->time,
                'limit' => $timer->limit,
                'decrement' => $userSettings->timer_decrement,
                'increment' => $userSettings->timer_increment,
                'timer_date' => $timer->created_at,
            ] );
    }

    public function decrement( Timer $timer ) {
        $user = Auth::user();

        if (! $timer->user == $user) {
            abort(403, 'Not your timer!');
        }

//        $timer->userDecrement($user->settings->timer_decrement);
        $timer->userDecrement($user);

        return [ 'success' => true ];

    }

    public function increment( Timer $timer ) {
        $user = Auth::user();

        if (! $timer->user == $user) {
            abort(403, 'Not your timer!');
        }

        $timer->userIncrement($user);

        return [ 'success' => true ];

    }
}
