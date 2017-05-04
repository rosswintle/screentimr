@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h1>ScreenTimer</h1>
            <p>Yes, I do appreciate the irony of a screen-timer that lives on a screen.</p>
            <p>But that is what I have made.</p>
            <h2>What does it do?</h2>
            <p>My screen timer is intended to track the screen time of children. Though, there's no
            reason you couldn't use it for adults. Or for any application that involves counting
            up and down.</p>
            <p>The timer has simple buttons to increment or decrement it.</p>
            <p>It saves the time so that you, or another person, can pick the timer up on another
            device.</p>
            <p>It resets each day.</p>
            <p>There are settings for the increment and decrement amounts, the initial value of the timer
            each day, and the maximum value of the timer.</p>
            <h2>Why bother</h2>
            <p>As with all my side projects, I'm mostling learning and practicing my coding skills.</p>
            <p>This app is written in Laravel and Vue.js, but also explores some interesting CSS techniques.</p>
        </div>
    </div>
</div>
@endsection
