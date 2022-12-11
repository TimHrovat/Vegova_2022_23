const doors = document.getElementsByClassName("door");
let success_count = 0;
let set_checkpoint_door = 0;
let right_door = 0;
let saved_checkpoint;

function give_meaning_to_doors() {
  set_checkpoint_door = Math.floor(Math.random() * 5);
  do {
    right_door = Math.floor(Math.random() * 5);
  } while (right_door === set_checkpoint_door);
}

function update_success_count() {
  const p = document.getElementById("success-attempts");
  p.innerHTML = "Successful attempts: " + success_count + "/3";
}

function update_door_message(text, color) {
  const h2 = document.getElementsByTagName("h2");
  h2[0].innerHTML = text;
  h2[0].style.color = color;
}

function show_win_screen() {
  document.getElementById("game-screen").style.display = "none";
  document.getElementById("win-screen").style.display = "block";
  document.body.style.backgroundColor = "green";
}

function show_game_screen() {
  document.getElementById("game-screen").style.display = "block";
  document.getElementById("win-screen").style.display = "none";
  document.body.style.backgroundColor = "rgb(18, 17, 19)";
  update_door_message("");
  success_count = 0;
  saved_checkpoint = {
    p_set_checkpoint_door: set_checkpoint_door,
    p_right_door: right_door,
    p_success_count: success_count,
  };
  update_success_count();
}

function check_click(index) {
  switch (index) {
    case set_checkpoint_door:
      saved_checkpoint.p_set_checkpoint_door = set_checkpoint_door;
      saved_checkpoint.p_right_door = right_door;
      saved_checkpoint.p_success_count = success_count;
      update_door_message("New checkpoint achieved!", "lightblue");
      break;
    case right_door:
      success_count += 1;
      update_door_message("That was the right door!", "green");
      break;
    default:
      set_checkpoint_door = saved_checkpoint.p_set_checkpoint_door;
      right_door = saved_checkpoint.p_right_door;
      success_count = saved_checkpoint.p_success_count;
      update_door_message("Wrong door! Returned to last checkpoint!", "red");
  }

  if (success_count === 3) show_win_screen();
  else give_meaning_to_doors();
}

show_game_screen();
give_meaning_to_doors();

console.log("right door ... " + right_door);
console.log("set checkpoint door ... " + set_checkpoint_door);

for (let i = 0; i < doors.length; i++) {
  doors[i].addEventListener("click", () => {
    check_click(i);
    update_success_count();
    console.log("right door ... " + right_door);
    console.log("set checkpoint door ... " + set_checkpoint_door);
    return 0;
  });
}

document.getElementById("reset-game").addEventListener("click", () => {
  show_game_screen();
});
