@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Settings for {{ $user->name }}</div>

                <div class="panel-body">
                    <form action="{{ action('UserSettingController@update') }}" method="POST">
                        {{ csrf_field() }}
                        <p>
                            Timer Increment (minutes) <input name="timer_increment" value="{{ $userSettings->timer_increment / 60 }}" type="number">
                        </p>
                        <p>
                            Timer Decrement (minutes) <input name="timer_decrement" value="{{ $userSettings->timer_decrement / 60 }}" type="number">
                        </p>
                        <p>
                            Default starting time (minutes) <input name="default_time" value="{{ $userSettings->default_time / 60 }}" type="number">
                        </p>
                        <p>
                            Default daily limit (minutes) <input name="default_limit" value="{{ $userSettings->default_limit / 60 }}" type="number">
                        </p>
                        <p>
                            <input type="submit" value="Save settings">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
