<template>

    <div class="piechart">
        <div class="first-half"></div>
        <div class="first-half-mask" v-show="timerPercent < 50" v-bind:style="{ transform: firstHalfMaskRotate }"></div>
        <div class="second-half" v-show="timerPercent > 50" v-bind:style="{ transform: secondHalfMaskRotate }"></div>
        <div class="middle"></div>
        <div class="timer">{{ timerMins }}:{{ timerSecs }}</div>
    </div>

    <div class="timer-controls">
        <span @click="decrementUser()">Down (-{{ decrement / 60 }})</span>
        <span @click="incrementUser()">Up (+{{ increment / 60 }})</span>
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
                let newTime = this.time - this.decrement;
                if (newTime < 0) {
                    newTime = 0;
                }
                this.$http.get('/api/timer/' + this.timer_id + '/decrement').then((response) => {
                    // success callback
                    this.time = newTime;
                }, (response) => {
                    // error callback
                });
            },
            incrementUser: function () {
                let newTime = this.time + this.increment;
                if (newTime > this.limit) {
                    newTime = this.limit;
                }
                this.$http.get('/api/timer/' + this.timer_id + '/increment').then((response) => {
                    // success callback
                    this.time = newTime;
                }, (response) => {
                    // error callback
                });
            }
        },
        watch: {
            timerPercent: function(newTimerPercent) {
                console.log(newTimerPercent);
                //piechart.update(newTimerPercent);
            }
        },
        ready: function() {
            console.log(this.timerPercent);
            //piechart.update( this.timerPercent );
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
            },
            timerPercent: function() {
                return (this.time / this.limit) * 100;
            },
            timerDegrees: function() {
                return 360 * (this.timerPercent / 100);
            },
            firstHalfMaskRotate: function() {
                return 'rotate(' + this.timerDegrees + 'deg)';
            },
            secondHalfMaskRotate: function() {
                return 'rotate(' + (this.timerDegrees - 180) + 'deg)';
            }
        },

        ready() {
            //setInterval( this.decrementInterval, 1000 );
            console.log('Component ready.')
        }

    }


/* var piechart = (function () {

  var update = function (percent) {
    if (percent > 50) {
      showSecondHalf();
      setSecondHalf(percent);
    } else {
      hideSecondHalf();
      setFirstHalfMask(percent);
    }
  };

  var setFirstHalfMask = function (percent) {
    var degreesToShow = percentToDegrees(percent);
    $('.piechart .first-half-mask').css({
      'transform': 'rotate(' + degreesToShow + 'deg)'
    });
  };

  var setSecondHalf = function (percent) {
    var degreesToShow = percentToDegrees(percent - 50);
    $('.piechart .second-half').css({
      'transform': 'rotate(' + degreesToShow + 'deg)'
    });
  };

  return {
    percentToDegrees: percentToDegrees,
    update: update
  };
})();
*/
//piechart.update($('input[type="number"]').val());
//$('input[type="number"]').change(function () {
//    piechart.update($(this).val());
//});

</script>
