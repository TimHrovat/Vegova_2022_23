function drawCircle(r) {
  const symbol = "*";
  const radius = r;

  const outerRad = radius + 0.5;
  const innerRad = radius - 0.5;

  for (let i = radius; i >= -radius; --i) {
    let string = "";

    for (let j = -radius; j <= radius; j += 0.5) {
      let value = Math.sqrt(
        Math.pow(Math.abs(j), 2) + Math.pow(Math.abs(i), 2)
      );

      if (value > innerRad && value < outerRad) {
        string += symbol;
      } else {
        string += " ";
      }
    }
    console.log(string);
  }
}

let rad = 0;
const max_rad = 20;
const min_rad = 0;
let make_larger = true;

function changeRad() {
  if (rad === max_rad) {
    make_larger = false;
  } else if (rad === min_rad) {
    make_larger = true;
  }

  console.clear();
  drawCircle(rad);

  rad = make_larger ? rad + 1 : rad - 1;
}

setInterval(changeRad, 50);
