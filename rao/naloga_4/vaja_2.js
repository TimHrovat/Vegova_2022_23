const readInt = require("readline").createInterface({
  input: process.stdin,
  output: process.stdout,
});

function isPrime(num) {
  for (let i = 2; i < num; i++) {
    if (num % i == 0) {
      return false;
    }
  }
  return true;
}

readInt.question("Vpiši število: ", (num) => {
  if (isPrime(num)) {
    console.log(`je praštevilo`);
  } else {
    console.log(`ni praštevilo`);
  }
  readInt.close();
});
