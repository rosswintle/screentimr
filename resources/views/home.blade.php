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
            <p>As with all my side projects, I'm mostly learning and practicing my coding skills.</p>
            <p>This app is written in Laravel and Vue.js, but also explores some interesting CSS techniques.</p>
            <h2>Privacy and Terms</h2>
            <p>I need to collect your name and email address to set up an account. This is so I know who you are and
                how to contact you should I need to, and so that you can log in to Screen Timer.</p>
            <p>Registering/logging in uses cookies to keep you logged in. I may also use analytics services that use cookies
                and collect anonymised data.</p>
            <p>Screen Timer is a side project offered with no guarantee of availability or accuracy. You use it at your
            own risk. If your kids throw the remote at the telly when time is up then that's your problem! Enjoy!</p>
            <p>This is a project of <a href="https://rosswintle.uk/">Ross Wintle</a> and <a href="https://oikos.digital/">Oikos Digital</a></p>
        </div>
    </div>
</div>
@endsection
