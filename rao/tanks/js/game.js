import { PlayerTank } from "./tanks/tank.player.js";
import { EnemyTank } from "./tanks/tank.enemy.js";

const canvas = document.getElementById("canvas");
export const ctx = canvas.getContext("2d");

ctx.canvas.width = window.innerWidth;
ctx.canvas.height = window.innerHeight;

const player = new PlayerTank(300, 300, 100, "green");
let enemies = [new EnemyTank(100, 100, 200, "red")];

// updates and draws all (60fps)
setInterval(() => {
  ctx.clearRect(0, 0, window.innerWidth, window.innerHeight);

  if (enemies.length == 0) spawnEnemyTank(200);

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
  if (enemies.length) enemies[getRandom(enemies.length - 1)].shoot();
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

document.addEventListener("click", (e) => {
  player.shoot();
});

function spawnEnemyTank(minDistanceFromPlayer) {
  const x = getRandomOutOfPlayerRadius(
    player.x,
    minDistanceFromPlayer,
    window.innerWidth
  );
  const y = getRandomOutOfPlayerRadius(
    player.y,
    minDistanceFromPlayer,
    window.innerHeight
  );

  enemies.push(new EnemyTank(x, y, 100, "RGB(117, 81, 57)"));
  console.log("Enemy tank spawned");
}

function getRandom(max) {
  return Math.floor(Math.random() * max);
}

function getRandomBetween(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}

function getRandomOutOfPlayerRadius(playerAxisValue, radius, maxValue) {
  const fromZeroToRadius = getRandom(playerAxisValue - radius);
  const fromRadiusToMaxValue = getRandomBetween(
    playerAxisValue + radius,
    maxValue
  );

  const random = getRandom(2);

  if (random == 1) return fromZeroToRadius;
  else return fromRadiusToMaxValue;
}

function checkCollisions() {
  enemies.forEach((enemy, index) => {
    // bullet from player hits enemy
    player.bullets.forEach((bullet, index) => {
      const distance = Math.sqrt(
        Math.pow(bullet.x - enemy.x, 2) + Math.pow(bullet.y - enemy.y, 2)
      );

      // checks if colided
      if (distance < enemy.radius) {
        enemy.currentHp -= 20;
        player.bullets.splice(index, 1);
      }
    });

    enemy.bullets.forEach((bullet, index) => {
      const distance = Math.sqrt(
        Math.pow(bullet.x - player.x, 2) + Math.pow(bullet.y - player.y, 2)
      );

      if (distance < player.radius) {
        player.currentHp -= 20;
        enemy.bullets.splice(index, 1);
      }
    });
  });
}

function checkHealth() {
  enemies.forEach((enemy, index) => {
    // deletes enemy with no hp
    if (enemy.currentHp <= 0) {
      enemies.splice(index, 1);
    }
  });

  if (player.currentHp <= 0) {
    window.location.replace("../html/index.html");
  }
}
