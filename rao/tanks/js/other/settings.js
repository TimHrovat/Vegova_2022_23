import { audio } from "./menu_audio.js";
import { setDefaultGameControls } from "./index.js";

let volume = document.getElementById("volume-slider");

export function loadSettingsDataFromLocalStorage() {
  const volumeFromLocalStorage = JSON.parse(localStorage.getItem("volume"));

  volume.value = volumeFromLocalStorage
    ? volumeFromLocalStorage * 100
    : audio.volume * 100;

  setDefaultGameControls();

  document.getElementById("controls-container").remove();
  const tab = document.createElement("table");
  tab.id = "controls-container";
  document.getElementById("settings-container").appendChild(tab);

  const controls = JSON.parse(localStorage.getItem("game_controls"));

  for (const [key, value] of Object.entries(controls)) {
    appendSetting(key, value);
  }
}

if (volume)
  volume.addEventListener("change", function (e) {
    audio.volume = e.currentTarget.value / 100;
    localStorage.setItem("volume", JSON.stringify(audio.volume));
  });

function appendSetting(key, value) {
  const container = document.createElement("tr");
  const keyContainer = document.createElement("td");
  const valueContainer = document.createElement("input");
  const button = document.createElement("button");

  keyContainer.innerHTML = "player_" + key;

  valueContainer.type = "text";
  valueContainer.value = value;
  valueContainer.minLength = "1";
  valueContainer.maxLength = "1";

  button.innerHTML = "save";

  const tdValue = document.createElement("td");
  const tdButton = document.createElement("td");
  tdButton.classList.add("hidden");
  tdValue.appendChild(valueContainer);
  tdButton.appendChild(button);

  valueContainer.addEventListener("focus", function (e) {
    e.preventDefault();

    tdButton.classList.remove("hidden");
  });

  button.addEventListener("click", function (e) {
    e.preventDefault();

    const val = valueContainer.value;

    if (val === "") return;

    tdButton.classList.add("hidden");

    const controls = JSON.parse(localStorage.getItem("game_controls"));

    controls[key] = val;

    localStorage.setItem("game_controls", JSON.stringify(controls));
  });

  container.appendChild(keyContainer);
  container.appendChild(tdValue);
  container.appendChild(tdButton);

  document.getElementById("controls-container").appendChild(container);
}
