function prestavi(st, n) {
  let arr = [];
  while (st !== 0) {
    let temp = st % 10;
    st = Math.floor(st / 10);
    arr.unshift(temp);
  }

  if (arr.length - 1 < n) return "error";
  else {
    let temp = arr[arr.length - 1];
    for (let i = 0; i < n; i++) {
      arr[arr.length - (1 + i)] = arr[arr.length - (2 + i)];
    }
    arr[arr.length - (n + 1)] = temp;
    return arr;
  }
}

console.log(prestavi(1234, 2));
