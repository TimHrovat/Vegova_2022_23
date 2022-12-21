import { PlayerTank } from "./tank_classes.js";

const canvas = document.getElementById("game-canvas");
const ctx = canvas.getContext("2d");

const player = new PlayerTank(300, 300, 100);

setInterval(() => {
  ctx.clearRect(0, 0, canvas.width, canvas.height);
  ctx.beginPath();
  player.draw();
  ctx.stroke();
}, 1000 / 60);

document.addEventListener("mousemove", (e) => {
  player.updateCannonAngle(e);
});

canvas.addEventListener("click", (e) => {
  player.move(e.clientX, e.clientY);
});

document.addEventListener("keydown", (e) => {
  player.handleKeyboard(e.key);
});
