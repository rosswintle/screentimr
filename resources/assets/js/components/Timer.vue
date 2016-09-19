<template>
    <div class="timer" @click="time -= 1">{{ time }}</div>
    <div class="timer-controls">
        <span @click="time -= decrement">Down</span>
        <span @click="time += increment">Up</span>
    </div>
</template>

<script>
    export default {

        props: ['time', 'decrement', 'increment'],

        methods: {
            decrementInterval: function () {
                this.time -= 1;
            }
        },

        ready() {
            setInterval( this.decrementInterval, 1000 );
            console.log('Component ready.')
        }

    }
</script>
