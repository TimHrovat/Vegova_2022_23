import { PlayerTank } from "./tanks/tank.player.js";

const canvas = document.getElementById("canvas");
export const ctx = canvas.getContext("2d");

ctx.canvas.width = window.innerWidth;
ctx.canvas.height = window.innerHeight;

const player = new PlayerTank(300, 300, 100, "orange");

setInterval(() => {
  ctx.clearRect(0, 0, window.innerWidth, window.innerHeight);
  player.update();
  player.draw();
  ctx.stroke();
}, 1000 / 60);

document.addEventListener("resize", (e) => {
  ctx.canvas.width = window.innerWidth;
  ctx.canvas.height = window.innerHeight;
});

document.addEventListener("mousemove", (e) => {
  player.cannonFollowObject(e.clientX, e.clientY);
});

document.addEventListener("keydown", (e) => {
  player.handleKeyDownEvent(e.key);
});

document.addEventListener("click", (e) => {
  player.shoot();
});
