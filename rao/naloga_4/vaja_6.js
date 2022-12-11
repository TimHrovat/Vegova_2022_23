let tab1 = "31ca";
let tab2 = "57db";

function crossSum() {
  let res = "";
  for (let i = 0; i < tab1.length || i < tab2.length; i++) {
    if (tab1.length > i) res += tab1[i];
    if (tab2.length > i) res += tab2[i];
  }
  return res;
}
console.log(crossSum());
