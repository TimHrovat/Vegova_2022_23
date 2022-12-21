import { ctx } from "../game.js";

export class Bullet {
  constructor(x, y, angle, speed) {
    // position & size
    this.radius = 5;
    this.x = x;
    this.y = y;

    this.angle = angle;
    this.speed = speed;
    this.calculateXYSpeedFromAngle(angle);
  }

  calculateXYSpeedFromAngle(angle) {
    this.speedX = this.speed * Math.cos(angle);
    this.speedY = this.speed * Math.sin(angle);
  }

  update() {
    this.x += this.speedX;
    this.y += this.speedY;
  }

  outOfBound() {
    if (
      this.x > window.innerWidth ||
      this.y > window.innerHeight ||
      this.x < 0 ||
      this.y < 0
    )
      return true;
    return false;
  }

  draw() {
    ctx.fillStyle = "white";
    ctx.arc(this.x, this.y, this.radius, 0, 2 * Math.PI);
    ctx.fill();

    // * for square bullets
    // ctx.translate(this.x, this.y);
    // ctx.rotate(this.angle);
    // ctx.fillRect(-this.width / 2, 0, this.width, this.height);
    // ctx.setTransform(1, 0, 0, 1, 0, 0);
  }
}
