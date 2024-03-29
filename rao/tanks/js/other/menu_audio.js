export let audio = new Audio("../../assets/menu.mp3");

const volumeFromLocalStorage = JSON.parse(localStorage.getItem("volume"));

try {
  audio.volume = volumeFromLocalStorage !== null ? volumeFromLocalStorage : 0.5;
  audio.loop = true;
  audio.play();
} catch (e) {
  console.log(e);
}

let volume = document.getElementById("volume-slider");

if (volume)
  volume.addEventListener("change", function (e) {
    audio.volume = e.currentTarget.value / 100;
    localStorage.setItem("volume", JSON.stringify(audio.volume));
  });
