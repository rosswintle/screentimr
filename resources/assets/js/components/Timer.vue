<template>
    <div class="timer">{{ timerMins }}</div>
    <div class="timer-controls">
        <span @click="decrementUser()">Down</span>
        <span @click="incrementUser()">Up</span>
    </div>
</template>

<script>
    export default {

        props: ['timer_id', 'time', 'decrement', 'increment'],

        methods: {
            decrementInterval: function () {
                if (this.time > 0) {
                    this.time -= 1;
                }
            },
            decrementUser: function () {
                this.time = this.time - this.decrement;
                if (this.time < 0) {
                    this.time = 0;
                }
                this.$http.get('/api/timer/' + this.timer_id + '/decrement').then((response) => {
                    // success callback
                }, (response) => {
                    // error callback
                });
            },
            incrementUser: function () {
                this.time += this.increment;
                this.$http.get('/api/timer/' + this.timer_id + '/increment').then((response) => {
                    // success callback
                }, (response) => {
                    // error callback
                });

            }
        },

        computed: {
            timerMins: function() {
                var mins = parseInt(this.time / 60);
                return this.time == 0 ? 0 : mins + 1;
            }
        },

        ready() {
            setInterval( this.decrementInterval, 1000 );
            console.log('Component ready.')
        }

    }
</script>
