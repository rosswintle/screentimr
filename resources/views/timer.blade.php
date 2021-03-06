@extends('layouts.app')

@section('content')
    <div id="app" class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>{{ date('l jS F Y', strtotime($timer_date)) }}</h3>
                        <timer  :timer_id="{{ $timerId }}"
                                :time="{{ $timer }}"
                                :limit="{{ $limit }}"
                                :increment="{{ $increment }}"
                                :decrement="{{ $decrement }}"
                                >
                        </timer>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection