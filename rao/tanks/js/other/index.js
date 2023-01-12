const a_play = document.getElementById("a-play");
const name = document.getElementById("name");

if (a_play)
  a_play.addEventListener("click", function (e) {
    e.preventDefault();

    name.classList.remove("error");

    if (name.value === "") {
      name.classList.add("error");
      return;
    } else {
      localStorage.setItem("current_player_name", name.value);
      window.location.replace("../html/game.html");
    }
  });

if (name) {
  const currentName = localStorage.getItem("current_player_name");
  if (currentName) name.value = currentName;
}

export function setDefaultGameControls() {
  if (
    localStorage.getItem("game_controls") === null ||
    JSON.stringify(localStorage.getItem("game_controls")) === "{}"
  ) {
    localStorage.setItem(
      "game_controls",
      JSON.stringify({
        up: "w",
        down: "s",
        left: "a",
        right: "d",
        shoot: " ",
      })
    );
  }
}

export function addScoreToScoreboard(playerName, score) {
  const scoreboard = JSON.parse(localStorage.getItem("scoreboard"));

  if (scoreboard == null) {
    localStorage.setItem(
      "scoreboard",
      JSON.stringify([
        {
          name: playerName,
          score: score,
        },
      ])
    );
    return;
  }

  scoreboard.push({ name: playerName, score: score });

  localStorage.setItem("scoreboard", JSON.stringify(scoreboard));
}
