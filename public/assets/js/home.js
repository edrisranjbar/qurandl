'use strict';

let audio = document.getElementById('audio');
const ui = {
    play: 'playButton',
    seeker: 'timelineController',
    seekerFace: 'timelineFace',
    currentTime: 'audioCurrentTime',
    duration: 'audioDuration',
    rewind: 'rewindButton',
    forward: 'forwardButton',
}

function get(id) {
    return document.getElementById(id);
}

function togglePlay() {
    if (audio.paused === false) {
        audio.pause();
    } else {
        audio.play();
    }
}

function formatTime(time) {
    let hours = parseInt(time / 3600);
    let minutes = parseInt((time - (hours * 3600)) / 60);
    let seconds = time % 60;
    let formattedTime =
        `${hours < 1 ? '' : `${hours}:`}${minutes < 10 ? `0${minutes}` : minutes}:${seconds < 10 ? `0${seconds.toFixed()}` : seconds.toFixed()}`

    return formattedTime;
}

function updateProgressBarFace() {
    get(ui.seekerFace).style.width = `${get(ui.seeker).value}%`;
}

function updateProgressBar() {
    let currentTimePercentage =
        (audio.currentTime / audio.duration).toFixed(2) * 100;

    get(ui.currentTime).innerText = formatTime(audio.currentTime);
    get(ui.seeker).value = currentTimePercentage;

    updateProgressBarFace();
}

function seek() {
    audio.currentTime = this.value * audio.duration / 100;
}

window.addEventListener('load', function () {
    if (isNaN(audio.duration)) {
        audio.addEventListener('play', function () {
            get(ui.duration).innerText = formatTime(audio.duration);
        });
    } else {
        get(ui.duration).innerText = formatTime(audio.duration);
    }
});

get(ui.play).addEventListener('click', togglePlay);
get(ui.rewind).addEventListener('click', function () {
    audio.currentTime -= 10;
});
get(ui.forward).addEventListener('click', function () {
    audio.currentTime += 10;
});
get(ui.seeker).addEventListener('input', seek);
audio.addEventListener('timeupdate', updateProgressBar);
audio.addEventListener('play', function () {
    get(ui.play).classList.remove('paused')
});
audio.addEventListener('pause', function () {
    get(ui.play).classList.add('paused')
});