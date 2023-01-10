import { PlayerTank } from "./tanks/tank.player.js";
import {
  spawnEnemyTank,
  checkCollisions,
  checkHealth,
  getRandom,
} from "./game_functions.js";

const canvas = document.getElementById("canvas");
export const ctx = canvas.getContext("2d");

ctx.canvas.width = window.innerWidth;
ctx.canvas.height = window.innerHeight;

export const player = new PlayerTank(300, 300, 4000, "green", 10);
export let enemies = [];
let numOfEnemies = 0;

// updates and draws all (60fps)
setInterval(() => {
  ctx.clearRect(0, 0, window.innerWidth, window.innerHeight);

  if (enemies.length == 0) {
    numOfEnemies++;
    for (let i = 0; i < numOfEnemies; i++) {
      spawnEnemyTank(200);
    }
  }

  player.update();
  checkCollisions();
  checkHealth();

  enemies.forEach((enemy) => {
    enemy.update();
    enemy.cannonFollowObject(player.x, player.y);
    enemy.draw();
    console.log(enemy.currentHp);
  });

  player.draw();
  ctx.stroke();
}, 1000 / 60);

// enemy shoots bullet every second
setInterval(() => {
  if (enemies.length) enemies[getRandom(enemies.length)].shoot();
  console.log(enemies);
}, 1000);

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

document.addEventListener("keyup", (e) => {
  player.handleKeyUpEvent(e.key);
});

document.addEventListener("keypress", (e) => {
  player.handleKeyPressEvent(e.key);
});

document.addEventListener("click", (e) => {
  player.shoot();
});
