import { Tank } from "./tank.js";
import { Bullet } from "./bullet.js";
import { setDefaultGameControls } from "../other/index.js";

export class PlayerTank extends Tank {
  constructor(x, y, hp, color, velocity) {
    super(x, y, hp, color, velocity);

    setDefaultGameControls();

    const keys = JSON.parse(localStorage.getItem("game_controls"));

    this.upKey = keys.up;
    this.downKey = keys.down;
    this.leftKey = keys.left;
    this.rightKey = keys.right;
    this.shootKey = keys.shoot;

    this.bulletMag = 30;
  }
  handleKeyDownEvent(key) {
    if (key == this.leftKey) this.speedX = -this.velocity;
    if (key == this.upKey) this.speedY = -this.velocity;
    if (key == this.downKey) this.speedY = this.velocity;
    if (key == this.rightKey) this.speedX = this.velocity;
  }

  handleKeyUpEvent(key) {
    if (key == this.leftKey && this.speedX < 0) this.speedX = 0;
    if (key == this.upKey && this.speedY < 0) this.speedY = 0;
    if (key == this.downKey && this.speedY > 0) this.speedY = 0;
    if (key == this.rightKey && this.speedX > 0) this.speedX = 0;
  }

  handleKeyPressEvent(key) {
    if (key == this.shootKey) this.shoot();
  }

  update() {
    // move
    this.x += this.speedX;
    this.y += this.speedY;

    // bounce from walls
    if (this.x + this.radius > window.innerWidth)
      this.x = window.innerWidth - this.radius;
    if (this.x - this.radius < 0) this.x = this.radius;
    if (this.y + this.radius > window.innerHeight)
      this.y = window.innerHeight - this.radius;
    if (this.y - this.radius < 0) this.y = this.radius;

    // destroy the bullet when out of sight
    this.bullets.forEach((bullet, index) => {
      bullet.update();

      if (bullet.outOfBound()) {
        this.bullets.splice(index, 1);
      }
    });
  }

  shoot() {
    if (this.bulletMag - 1 < 0) return;

    this.bulletMag--;

    this.bullets.push(
      new Bullet(this.x, this.y, this.cannonAngle + Math.PI / 2, 25)
    );
  }

  updateControls() {
    const keys = JSON.parse(localStorage.getItem("game_controls"));

    this.upKey = keys.up;
    this.downKey = keys.down;
    this.leftKey = keys.left;
    this.rightKey = keys.right;
    this.shootKey = keys.shoot;
  }
}
