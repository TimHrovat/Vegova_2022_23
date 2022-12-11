class Lik {
  constructor(x, y) {
    this.x = x;
    this.y = y;
  }

  get x() {
    return this._x;
  }

  get y() {
    return this._y;
  }

  set x(newX) {
    this._x = newX;
  }

  set y(newY) {
    this._y = newY;
  }
}

class Rectangle extends Lik {
  constructor(x, y, a, b) {
    super(x, y, a, b);
    this.x = x;
    this.y = y;
    this.a = a;
    this.b = b;
  }

  get a() {
    return this._a;
  }

  get b() {
    return this._b;
  }

  set a(newA) {
    this._a = newA;
  }

  set b(newB) {
    this._b = newB;
  }

  get area() {
    return this.a * this.b;
  }
}

class Circle extends Lik {
  constructor(x, y, r) {
    super(x, y, r);
    this.x = x;
    this.y = y;
    this.r = r;
  }

  get r() {
    return this._r;
  }

  set r(newRadius) {
    this._r = newRadius;
  }

  get area() {
    return Math.pi * pow(this.r, 2);
  }
}

let rect = new Rectangle(0, 2, 3, 4);
console.log(rect.y);
