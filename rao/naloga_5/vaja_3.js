function diamond(n) {
  for (let i = 0; i < n; i++) {
    let t_str = "";
    for (let j = 0; j < n - i - 1; j++) {
      t_str += " ";
    }
    for (let j = 0; j < 1 + 2 * i; j++) {
      t_str += "*";
    }
    t_str += "\n";
    console.log(t_str);
  }
  for (let i = 0; i < n - 1; i++) {
    let t_str = "";
    for (let j = 0; j < i + 1; j++) {
      t_str += " ";
    }
    for (let j = 0; j < 1 + 2 * (n - i - 2); j++) {
      t_str += "*";
    }
    t_str += "\n";
    console.log(t_str);
  }
}

diamond(2);
