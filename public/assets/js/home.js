'use strict';

let audios = document.querySelectorAll(".best-recitation-audio");

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


function togglePlay(audio) {
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

function seek(audio) {
    audio.currentTime = this.value * audio.duration / 100;
}

audios.forEach((audio) => {
    window.addEventListener('load', function () {
        if (isNaN(audio.duration)) {
            audio.addEventListener('play', function () {
                get(ui.duration).innerText = formatTime(audio.duration);
            });
        } else {
            get(ui.duration).innerText = formatTime(audio.duration);
        }
    });

    get(ui.play).addEventListener('click', togglePlay(audio));

    get(ui.seeker).addEventListener('input', seek(audio));

    audio.addEventListener('play', function () {
        get(ui.play).classList.remove('paused')
    });
    audio.addEventListener('pause', function () {
        get(ui.play).classList.add('paused')
    });
});

