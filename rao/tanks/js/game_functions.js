import {
  player,
  enemies,
  powerups,
  ctx,
  canvas,
  incrementKilledEnemies,
  killedEnemies,
} from "./game.js";
import { EnemyTank } from "./tanks/tank.enemy.js";
import { Medkit } from "./powerups/medkit.js";
import { Magazine } from "./powerups/magazine.js";
import { addScoreToScoreboard } from "./other/index.js";

const img = new Image();
img.src = "../assets/carbon_fibre.png";

export function drawBackground() {
  const ptrn = ctx.createPattern(img, "repeat");
  ctx.fillStyle = ptrn;
  ctx.fillRect(0, 0, canvas.width, canvas.height);
}

let gameRunning = true;

export function spawnEnemyTank(minDistanceFromPlayer) {
  const x = getRandomOutOfPlayerRadius(
    player.x,
    minDistanceFromPlayer,
    window.innerWidth,
    70
  );
  const y = getRandomOutOfPlayerRadius(
    player.y,
    minDistanceFromPlayer,
    window.innerHeight,
    70
  );

  enemies.push(new EnemyTank(x, y, 100, "RGB(117, 81, 57)", 6));
}

export function createNewMedkit(minDistanceFromPlayer) {
  const x = getRandomOutOfPlayerRadius(
    player.x,
    minDistanceFromPlayer,
    window.innerWidth,
    40
  );
  const y = getRandomOutOfPlayerRadius(
    player.y,
    minDistanceFromPlayer,
    window.innerHeight,
    40
  );

  powerups.medkits.push(new Medkit(x, y, 40, 40, 20, "medkit"));
}

export function createNewMagazine(minDistanceFromPlayer) {
  const x = getRandomOutOfPlayerRadius(
    player.x,
    minDistanceFromPlayer,
    window.innerWidth,
    40
  );
  const y = getRandomOutOfPlayerRadius(
    player.y,
    minDistanceFromPlayer,
    window.innerHeight,
    40
  );

  powerups.magazines.push(new Magazine(x, y, 40, 40, 20, "magazine"));
}

export function createFirstPowerups() {
  for (let i = 0; i < 3; i++) {
    createNewMagazine(150);
    createNewMedkit(150);
  }
}

export function checkPowerupCollisions() {
  powerups.magazines.forEach((mag, index) => {
    const distance = Math.sqrt(
      Math.pow(mag.x + mag.width / 2 - player.x, 2) +
        Math.pow(mag.y + mag.height / 2 - player.y, 2)
    );

    if (distance < player.radius) {
      player.bulletMag += mag.capacity;
      powerups.magazines.splice(index, 1);
      createNewMagazine(150);
    }
  });
  powerups.medkits.forEach((med, index) => {
    const distance = Math.sqrt(
      Math.pow(med.x + med.width / 2 - player.x, 2) +
        Math.pow(med.y + med.height / 2 - player.y, 2)
    );

    const valid = player.currentHp + med.capacity < player.maxHp;

    if (distance < player.radius) {
      if (!valid) {
        player.currentHp = player.maxHp;
      } else {
        player.currentHp += med.capacity;
      }

      powerups.medkits.splice(index, 1);
      createNewMedkit(150);
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
    // enemy killed
    if (enemy.currentHp <= 0) {
      enemies.splice(index, 1);
      incrementKilledEnemies();
    }
  });

  if (player.currentHp <= 0 && gameRunning) {
    localStorage.setItem("last_score", killedEnemies);
    addScoreToScoreboard(
      localStorage.getItem("current_player_name"),
      killedEnemies
    );
    gameRunning = false;
    window.location.replace("../html/index.html");
  }
}

function getRandomBetween(min, max) {
  return Math.floor(Math.random() * (max - min) + min);
}

function getRandomOutOfPlayerRadius(playerAxisValue, radius, maxValue, offset) {
  let fromZeroToRadius;
  let fromRadiusToMaxValue;
  const valid = [];

  do {
    fromZeroToRadius = getRandomBetween(offset * 2, playerAxisValue - radius);
    fromRadiusToMaxValue = getRandomBetween(
      playerAxisValue + radius,
      maxValue - offset * 2
    );

    if (fromZeroToRadius > 0 && playerAxisValue - radius > offset)
      valid.push(fromZeroToRadius);
    if (
      fromRadiusToMaxValue < maxValue &&
      playerAxisValue + radius < maxValue - radius
    )
      valid.push(fromRadiusToMaxValue);
  } while (valid.length === 0);

  const random = getRandom(valid.length);

  return valid[random];
}
