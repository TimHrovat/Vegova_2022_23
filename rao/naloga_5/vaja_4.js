const car = {
  firstName: "John",
  lastName: "Doe",
  hp: 650,
  price: 120000,
  color: "black",
};

const cars = [
  car,
  {
    firstName: "Tim",
    lastName: "Hrovat",
    hp: 700,
    price: 80000,
    color: "silver",
  },
  {
    firstName: "Zan",
    lastName: "Ambr",
    hp: 400,
    price: 70000,
    color: "white",
  },
];

function carCompare(cars) {
  let maxCar = cars[0];

  for (let i = 1; i < cars.length; i++) {
    if (maxCar.hp / maxCar.price < cars[i].hp / cars[i].price) {
      maxCar = cars[i];
    }
  }

  console.log(maxCar);
}

carCompare(cars);
