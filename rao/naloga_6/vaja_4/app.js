const form = document.forms["login"];

const usrnm = "user";
const pswd = "pswd";

function comp() {
  if (
    form.elements.username.value === usrnm &&
    form.elements.password.value === pswd
  )
    document.body.style.backgroundColor = "green";
  else document.body.style.backgroundColor = "red";

  return false;
}

form.onsubmit = comp;
