const readLine = require("readline").createInterface({
  input: process.stdin,
  output: process.stdout,
});

let originalString = "asdfgjbvsjadofjvčaksjfo";

function findString(str) {
  for (let i = 0; i < originalString.length; i++) {
    if (str[0] === originalString[i]) {
      let found = true;
      if (str.length === 1) return i;
      for (let j = 1; j < str.length && found === true; j++) {
        if (str[j] !== originalString[i + j]) {
          found = false;
        } else if (str.length - 1 === j) {
          return i;
        }
      }
    }
  }
  return -1;
}

readLine.question("Vpiši iskani niz: ", (str) => {
  let res = findString(str);
  if (res >= 0) {
    console.log("indeks: " + res);
  } else {
    console.log("not found");
  }
  readLine.close();
});
