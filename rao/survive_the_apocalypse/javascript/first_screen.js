const highScore = document.getElementById("high-score");

if (localStorage.getItem("high-score"))
  highScore.innerHTML = "High score: " + localStorage.getItem("high-score");
