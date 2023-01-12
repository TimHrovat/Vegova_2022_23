export let audio = new Audio("../../assets/menu.mp3");

const volumeFromLocalStorage = JSON.parse(localStorage.getItem("volume"));

audio.volume = volumeFromLocalStorage !== null ? volumeFromLocalStorage : 0.5;
audio.loop = true;
audio.play();
