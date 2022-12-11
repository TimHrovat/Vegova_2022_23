for (let i = 1; i < 11; i++) {
  let p = document.createElement("p");
  p.innerHTML = i;
  p.style.color =
    "#" + Math.floor(Math.random() * (Math.pow(2, 24) - 1)).toString(16);
  document.body.appendChild(p);
}
