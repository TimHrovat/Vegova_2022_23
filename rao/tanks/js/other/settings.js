let audio = new Audio("audio.mp3");

audio.volume = 1;
audio.loop = true;
audio.play();

let volume = document.getElementById("volume-slider");
volume.addEventListener("change", function (e) {
  audio.volume = e.currentTarget.value / 100;
});
