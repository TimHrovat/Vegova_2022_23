const scoresContainer = document.getElementById("scores-container");

let loggedScores = JSON.parse(localStorage.getItem("scoreboard"));

let count = 1;

if (loggedScores) {
  loggedScores.sort((a, b) => b.score - a.score);
  loggedScores.forEach((log, index, arr) => {
    const divScore = document.createElement("tr");
    const pScore = document.createElement("td");
    const pName = document.createElement("td");
    const pNum = document.createElement("td");

    pScore.innerHTML = log.score;
    pName.innerHTML = log.name;
    pNum.innerHTML = count + ".";

    divScore.classList.add("score");
    divScore.appendChild(pNum);
    divScore.appendChild(pName);
    divScore.appendChild(pScore);

    scoresContainer.appendChild(divScore);

    count++;

    if (count > 10) arr.length = index + 1;
  });
} else {
  scoresContainer.innerHTML = "You need to play some games to show scores!";
}
