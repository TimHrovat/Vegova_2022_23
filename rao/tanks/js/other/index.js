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

export function addScoreToScoreboard(playerName, score) {}
