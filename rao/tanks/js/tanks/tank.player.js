import { Tank } from "./tank.js";

export class PlayerTank extends Tank {
  handleKeyDownEvent(key) {
    if (key == "a") this.speedX = -this.velocity;
    if (key == "w") this.speedY = -this.velocity;
    if (key == "s") this.speedY = this.velocity;
    if (key == "d") this.speedX = this.velocity;
    if (key == " ") this.shoot();
  }
}

//TODO: Q ustav tank in mu da boost
