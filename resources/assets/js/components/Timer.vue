<template>
    <div class="timer">{{ timerMins }}:{{ timerSecs }}</div>
    <div class="timer-controls">
        <span @click="decrementUser()">Down</span>
        <span @click="incrementUser()">Up</span>
    </div>
    <div class="limit">
        Today's limit: {{ limitMins }}:{{ limitSecs }}
    </div>
</template>

<script>
    export default {

        props: ['timer_id', 'time', 'limit', 'decrement', 'increment'],

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
                return parseInt(this.time / 60);
            },
            timerSecs: function() {
                var secs = parseInt(this.time % 60);
                return secs < 10 ? '0' + secs : secs;
            },
            limitMins: function() {
                return parseInt(this.limit / 60);
            },
            limitSecs: function() {
                var secs = parseInt(this.limit % 60);
                return secs < 10 ? '0' + secs : secs;
            }
        },

        ready() {
            //setInterval( this.decrementInterval, 1000 );
            console.log('Component ready.')
        }

    }
</script>
