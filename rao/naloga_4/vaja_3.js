let fruits = ["apple", "banana", "kiwi", "orange", "lemon"];

let maxLen = 0;
let maxLenFruit = "";
fruits.forEach((a) => {
  thisLen = a.length;
  console.log(thisLen);
  if (thisLen > maxLen) {
    maxLen = thisLen;
    maxLenFruit = a;
  }
});

console.log(maxLenFruit);
