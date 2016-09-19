<?php

namespace App\Http\Controllers;

use App\Timer;
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
        dd($timer);
    }
}
