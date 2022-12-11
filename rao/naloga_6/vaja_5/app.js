const form = document.forms.data;
const table = document.getElementById("bmi_table");

function calc_bmi() {
  const elements = form.elements;
  const bmi = elements.weight.value / Math.pow(elements.height.value / 100, 2);
  add_to_table(elements.weight.value, elements.height.value, bmi);
  return false;
}

function add_to_table(weight, height, bmi) {
  console.log(height);
  const tr = document.createElement("tr");
  const td_weight = document.createElement("td");
  td_weight.innerHTML = weight;
  const td_height = document.createElement("td");
  td_height.innerHTML = height;
  const td_bmi = document.createElement("td");
  td_bmi.innerHTML = bmi;

  if (bmi < 17) td_bmi.className = "underweight";
  else if (bmi > 25) td_bmi.className = "overweight";
  else td_bmi.className = "normal";

  tr.appendChild(td_weight);
  tr.appendChild(td_height);
  tr.appendChild(td_bmi);

  table.appendChild(tr);
}

form.onsubmit = calc_bmi;
