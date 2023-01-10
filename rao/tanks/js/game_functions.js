import { player, enemies } from "./game.js";
import { EnemyTank } from "./tanks/tank.enemy.js";

export function spawnEnemyTank(minDistanceFromPlayer) {
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

  enemies.push(new EnemyTank(x, y, 100, "RGB(117, 81, 57)", 6));
  console.log("Enemy tank spawned");
}

export function getRandom(max) {
  return Math.floor(Math.random() * max);
}

export function checkCollisions() {
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

export function checkHealth() {
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
