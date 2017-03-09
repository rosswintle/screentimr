<?php

namespace App\Http\Controllers;

use App\UserSetting;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UserSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id = null)
    {
        if (is_null($id)) {
            $userSettings = UserSetting::where('user_id', Auth::id())->first();
        } else {
            $userSettings = UserSetting::findOrFail($id);
        }
        $user = Auth::user();
        return view('settings', [
            'user' => $user,
            'userSettings' => $userSettings,
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id = null)
    {
        if (is_null($id)) {
            $userSettings = UserSetting::where('user_id', Auth::id())->first();
        } else {
            $userSettings = UserSetting::findOrFail($id);
        }

        $userSettings->timer_increment = $request->input('timer_increment') * 60;
        $userSettings->timer_decrement = $request->input('timer_decrement') * 60;
        $userSettings->default_time = $request->input('default_time') * 60;
        $userSettings->default_limit = $request->input('default_limit') * 60;
        $userSettings->save();

        $user = Auth::user();
        return view('settings', [
            'user' => $user,
            'userSettings' => $userSettings,
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
