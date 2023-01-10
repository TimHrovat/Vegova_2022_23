import { player, enemies, powerups } from "./game.js";
import { EnemyTank } from "./tanks/tank.enemy.js";
import { Medkit } from "./powerups/medkit.js";
import { Magazine } from "./powerups/magazine.js";

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
}

export function createNewMedkit(minDistanceFromPlayer) {
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

  powerups.medkits.push(new Medkit(x, y, 40, 40, 20, "medkit"));
}

export function createNewMagazine(minDistanceFromPlayer) {
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

  powerups.magazines.push(new Magazine(x, y, 40, 40, 20, "magazine"));
}

export function createFirstPowerups() {
  for (let i = 0; i < 3; i++) {
    createNewMagazine(200);
    createNewMedkit(200);
  }
}

export function checkPowerupCollisions() {
  powerups.magazines.forEach((mag, index) => {
    const distance = Math.sqrt(
      //TODO: fix collision
      Math.pow(mag.x + mag.width - player.x, 2) +
        Math.pow(mag.y + mag.height - player.y, 2)
    );

    if (distance < player.radius) {
      player.bulletMag += mag.capacity;
      powerups.magazines.splice(index, 1);
      createNewMagazine(200);
    }
  });
  powerups.medkits.forEach((med, index) => {
    const distance = Math.sqrt(
      //TODO: fix collision
      Math.pow(med.x + med.width - player.x, 2) +
        Math.pow(med.y + med.height - player.y, 2)
    );

    if (distance < player.radius) {
      player.currentHp += med.capacity;
      powerups.medkits.splice(index, 1);
      createNewMedkit(200);
    }
  });
}

export function drawPowerups() {
  powerups.magazines.forEach((mag) => mag.draw());
  powerups.medkits.forEach((med) => med.draw());
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
