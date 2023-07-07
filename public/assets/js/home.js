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

function seek(audio, element) {
    audio.currentTime = element.value * audio.duration / 100;
}

function updateProgressBar(audio) {
    let currentTimePercentage =
        (audio.currentTime / audio.duration).toFixed(2) * 100;
    audio.parentElement.querySelector(`#${ui.currentTime}`).innerText = formatTime(audio.currentTime);
    audio.parentElement.querySelector(`#${ui.seeker}`).value = currentTimePercentage;
}

audios.forEach((audio) => {
    window.addEventListener('load', function () {
        if (isNaN(audio.duration)) {
            audio.addEventListener('play', function (event) {
                let parent = event.target.parentElement;
                parent.querySelector(`#${ui.duration}`).innerText = formatTime(audio.duration);
            });
        } else {
            // parent.querySelector(`#${ui.duration}`).innerText = formatTime(audio.duration);
        }
    });

    let parent = audio.parentElement;
    parent.querySelector(`#${ui.play}`).addEventListener('click', () => {
        togglePlay(audio);
    });
    parent.querySelector(`#${ui.seeker}`).addEventListener('input', (e) => {
        seek(audio, e.target);
    });
    audio.addEventListener('timeupdate', (e) => {
        updateProgressBar(audio);
    });
    audio.addEventListener('play', function (e) {
        let parent = e.target.parentElement;
        parent.querySelector(`#${ui.play}`).classList.remove('paused');
    });
    audio.addEventListener('pause', function (e) {
        let parent = e.target.parentElement;
        parent.querySelector(`#${ui.play}`).classList.add('paused');
    });
});

