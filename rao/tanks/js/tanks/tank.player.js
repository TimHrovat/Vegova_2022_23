import { Tank } from "./tank.js";

export class PlayerTank extends Tank {
  constructor(x, y, hp, color, velocity) {
    super(x, y, hp, color, velocity);

    this.bulletMag = 30;
  }
  handleKeyDownEvent(key) {
    if (key == "a") this.speedX = -this.velocity;
    if (key == "w") this.speedY = -this.velocity;
    if (key == "s") this.speedY = this.velocity;
    if (key == "d") this.speedX = this.velocity;
  }

  handleKeyUpEvent(key) {
    if (key == "a" && this.speedX < 0) this.speedX = 0;
    if (key == "w" && this.speedY < 0) this.speedY = 0;
    if (key == "s" && this.speedY > 0) this.speedY = 0;
    if (key == "d" && this.speedX > 0) this.speedX = 0;
  }

  handleKeyPressEvent(key) {
    if (key == " ") this.shoot();
  }

  shoot() {
    this.bulletMag--;

    if (this.bulletMag == 0) return;

    this.bullets.push(
      new Bullet(this.x, this.y, this.cannonAngle + Math.PI / 2, 25)
    );
  }
}

//TODO: Q ustav tank in mu da boost
