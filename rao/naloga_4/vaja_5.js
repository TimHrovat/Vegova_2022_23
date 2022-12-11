const readInt = require("readline").createInterface({
  input: process.stdin,
  output: process.stdout,
});

function digitSum(num) {
  let sum = 0;
  while (num > 0) {
    sum += num % 10;
    num /= 10;
    num = Math.floor(num);
  }
  return sum;
}

readInt.question("Vpiši število: ", (num) => {
  console.log(digitSum(num));
  readInt.close();
});
