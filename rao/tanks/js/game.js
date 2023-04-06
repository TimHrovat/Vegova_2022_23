import { PlayerTank } from "./tanks/tank.player.js";
import {
  spawnEnemyTank,
  checkCollisions,
  checkHealth,
  getRandom,
  createFirstPowerups,
  drawPowerups,
  checkPowerupCollisions,
  drawBackground,
  updateCurrentScores,
  changeGameRunning,
  gameRunning,
} from "./game_functions.js";

export const canvas = document.getElementById("canvas");
export const ctx = canvas.getContext("2d");

ctx.canvas.width = window.innerWidth;
ctx.canvas.height = window.innerHeight;

export const player = new PlayerTank(300, 300, 100, "green", 10);
export let enemies = [];
export let powerups = {
  magazines: [],
  medkits: [],
};

let numOfEnemies = 0;

createFirstPowerups();

export let killedEnemies = 0;

export function incrementKilledEnemies() {
  killedEnemies++;
}

// updates and draws all (60fps)
setInterval(() => {
  if (!gameRunning) return;

  ctx.clearRect(0, 0, window.innerWidth, window.innerHeight);

  drawBackground();

  if (enemies.length == 0) {
    numOfEnemies++;
    for (let i = 0; i < numOfEnemies; i++) {
      spawnEnemyTank(200);
    }
  }

  checkPowerupCollisions();
  drawPowerups();

  enemies.forEach((enemy) => {
    enemy.update();
    enemy.cannonFollowObject(player.x, player.y);
    enemy.draw();
  });

  player.update();
  checkCollisions();
  checkHealth();
  player.draw();

  updateCurrentScores();

  ctx.stroke();
}, 1000 / 60);

// enemy shoots bullet every second
setInterval(() => {
  if (!gameRunning) return;

  if (enemies.length) enemies[getRandom(enemies.length)].shoot();
}, 1000);

document.addEventListener("resize", (e) => {
  ctx.canvas.width = window.innerWidth;
  ctx.canvas.height = window.innerHeight;
});

document.addEventListener("mousemove", (e) => {
  player.cannonFollowObject(e.clientX, e.clientY);
});

document.addEventListener("keydown", (e) => {
  if (e.key == "p") {
    changeGameRunning();
  }

  if (!gameRunning) return;

  player.handleKeyDownEvent(e.key);
});

document.addEventListener("keyup", (e) => {
  if (!gameRunning) return;

  player.handleKeyUpEvent(e.key);
});

document.addEventListener("keypress", (e) => {
  if (!gameRunning) return;

  player.handleKeyPressEvent(e.key);
});

// document.addEventListener("click", (e) => {
//   if (!gameRunning) return;

//   player.shoot();
// });
