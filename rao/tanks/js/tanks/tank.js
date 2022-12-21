import { Bullet } from "./bullet.js";
import { ctx } from "../game.js";

export class Tank {
  constructor(x, y, hp, color) {
    // position & size
    this.x = x;
    this.y = y;
    this.radius = 35;
    // speed & velocity
    this.speedX = 0;
    this.speedY = 0;
    this.velocity = 6;

    this.hp = hp;
    this.color = color;

    // cannon
    this.cannonAngle = 0;
    this.cannonWidth = 15;
    this.cannonHeight = 45;
    // bullet
    this.bullets = [];
  }

  cannonFollowObject(objectX, objectY) {
    if (objectY > this.y - 1) {
      this.cannonAngle = -Math.atan((objectX - this.x) / (objectY - this.y));
    } else {
      this.cannonAngle =
        Math.PI + -Math.atan((objectX - this.x) / (objectY - this.y));
    }
  }

  update() {
    // move
    this.x += this.speedX;
    this.y += this.speedY;

    // bounce from walls
    if (this.x + this.radius > window.innerWidth) this.speedX = -this.velocity;
    if (this.x - this.radius < 0) this.speedX = this.velocity;
    if (this.y + this.radius > window.innerHeight) this.speedY = -this.velocity;
    if (this.y - this.radius < 0) this.speedY = this.velocity;

    // destroy the bullet when out of sight
    this.bullets.forEach((bullet, index) => {
      bullet.update();

      if (bullet.outOfBound()) {
        this.bullets.splice(index, 1);
      }
    });
  }

  draw() {
    this.bullets.forEach((bullet) => {
      ctx.beginPath(); //! do not remove -> breaks for some reason
      bullet.draw();
    });
    ctx.beginPath();
    ctx.fillStyle = this.color;
    ctx.arc(this.x, this.y, this.radius, 0, 2 * Math.PI);
    ctx.fill();

    //cannon
    ctx.beginPath();
    ctx.fillStyle = "black";
    ctx.translate(this.x, this.y);
    ctx.rotate(this.cannonAngle);
    ctx.fillRect(-this.cannonWidth / 2, 0, this.cannonWidth, this.cannonHeight);
    ctx.setTransform(1, 0, 0, 1, 0, 0);
  }

  shoot() {
    this.bullets.push(
      new Bullet(this.x, this.y, this.cannonAngle + Math.PI / 2, 25)
    );
  }
}
