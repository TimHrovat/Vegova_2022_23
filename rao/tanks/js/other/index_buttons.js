import { loadSettingsDataFromLocalStorage } from "./settings.js";

const show_scoreboard = document.getElementById("show-scoreboard");
const show_settings = document.getElementById("show-settings");
const show_main_menu = document.getElementsByClassName("show-main-menu");

const scoreboard = document.getElementById("scoreboard");
const settings = document.getElementById("settings");
const main_menu = document.getElementById("main-menu");

show_scoreboard.addEventListener("click", (e) => {
  e.preventDefault();

  scoreboard.classList.remove("hidden");
  settings.classList.add("hidden");
  main_menu.classList.add("hidden");
});

show_settings.addEventListener("click", (e) => {
  e.preventDefault();

  loadSettingsDataFromLocalStorage();

  scoreboard.classList.add("hidden");
  settings.classList.remove("hidden");
  main_menu.classList.add("hidden");
});

for (let i = 0; i < 2; i++) {
  show_main_menu[i].addEventListener("click", (e) => {
    e.preventDefault();

    scoreboard.classList.add("hidden");
    settings.classList.add("hidden");
    main_menu.classList.remove("hidden");
  });
}
