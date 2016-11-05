<template>
    <div class="timer">{{ timerMins }}</div>
    <div class="timer-controls">
        <span @click="decrementUser()">Down</span>
        <span @click="time += increment">Up</span>
    </div>
</template>

<script>
    export default {

        props: ['time', 'decrement', 'increment'],

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
            }
        },

        computed: {
            timerMins: function() {
                return parseInt(this.time / 60) + 1;
            }
        },

        ready() {
            setInterval( this.decrementInterval, 1000 );
            console.log('Component ready.')
        }

    }
</script>
