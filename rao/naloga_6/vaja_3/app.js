const button = document.getElementById("btn");

button.addEventListener("mouseover", () => {
  button.style.left = Math.floor(Math.random() * 90).toString() + "%";
  button.style.top = Math.floor(Math.random() * 90).toString() + "%";
});

button.addEventListener("click", () => {
  document.body.removeChild(button);
  const win = document.createElement("h1");
  win.innerHTML = "You win!";
  win.id = "win";
  document.body.appendChild(win);
  document.body.style.backgroundColor = "green";
});
