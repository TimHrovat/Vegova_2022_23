import { ctx } from "../game.js";

export class Powerup {
  constructor(x, y, width, height, capacity, imageId) {
    this.capacity = capacity;
    this.x = x;
    this.y = y;
    this.width = width;
    this.height = height;
    this.image = document.getElementById(imageId);
  }

  draw() {
    ctx.beginPath();
    drawImage(this.image, this.x, this.y, this.width, this.height);
  }
}
