const canvas = document.getElementById("game-canvas");
const ctx = canvas.getContext("2d");

class tank {
  constructor(x, y, hp) {
    this.x = x;
    this.y = y;
    this.hp = hp;
    this.radius = 28;
    this.cannonAngle = 0;
    this.cannonWidth = 13;
    this.cannonHeight = 45;
    this.speed = 10;
  }
  update() {}

  draw() {}
}

export class PlayerTank extends tank {
  handleKeyboard(key) {
    if (key == "a") this.x -= this.speed;
    if (key == "w") this.y -= this.speed;
    if (key == "s") this.y += this.speed;
    if (key == "d") this.x += this.speed;
    console.log(key);
    console.log(this.x);
    console.log(this.y);
  }

  move(x, y) {
    thi;
  }

  updateCannonAngle(e) {
    let leftMargin = (window.innerWidth - canvas.width) / 2;
    let topMargin = (window.innerHeight - canvas.height) / 2;

    if (e.clientY - topMargin > this.x) {
      this.cannonAngle = -Math.atan(
        (e.clientX - leftMargin - this.x) / (e.clientY - topMargin - this.y)
      );
    } else {
      this.cannonAngle =
        Math.PI +
        -Math.atan(
          (e.clientX - leftMargin - this.x) / (e.clientY - topMargin - this.y)
        );
    }
  }

  draw() {
    //tank
    ctx.fillStyle = "orange";
    ctx.arc(this.x, this.y, this.radius, 0, 2 * Math.PI);
    ctx.fill();

    //cannon
    ctx.fillStyle = "black";
    ctx.translate(this.x, this.y);
    ctx.rotate(this.cannonAngle);
    ctx.fillRect(-this.cannonWidth / 2, 0, this.cannonWidth, this.cannonHeight);
    ctx.setTransform(1, 0, 0, 1, 0, 0);
  }
}
