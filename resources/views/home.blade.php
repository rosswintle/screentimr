@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Settings for {{ $user->name }}</div>

                <div class="panel-body">
                    <form action="{{ action('UserSettingController@update') }}" method="POST">
                        <p>
                            Timer Increment <input name="timer_increment" value="{{ $userSettings->timer_increment }}" type="number">
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
