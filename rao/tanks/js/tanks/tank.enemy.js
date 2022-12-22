import { Tank } from "./tank.js";

export class EnemyTank extends Tank {
  constructor(x, y, hp, color) {
    super(x, y, hp, color);

    this.setMovement();
  }

  setMovement() {
    this.speedX = this.randPositiveOrNegative() * this.velocity;
    this.speedY = this.randPositiveOrNegative() * this.velocity;
  }

  randPositiveOrNegative() {
    return Math.floor(Math.random() - 1);
  }
}
