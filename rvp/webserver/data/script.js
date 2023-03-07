const temp_el = document.getElementById("temp-state");
const hum_el = document.getElementById("humidity-state");
const heater_state_icon = document.getElementById("heater-state-icon");
const dehumidifier_state_icon = document.getElementById(
  "dehumidifier-state-icon"
);

heater_state_icon.addEventListener("click", setEventListener);
dehumidifier_state_icon.addEventListener("click", setEventListener);

function setEventListener(e) {
  e.preventDefault();
  const currentState = e.target.getAttribute("state");

  if (currentState === "false") {
    setDevice(e.target.name, "on");
    e.target.setAttribute("state", true);
    e.target.classList.add("svg-on");
    e.target.classList.remove("svg-off");
  } else {
    setDevice(e.target.name, "off");
    e.target.setAttribute("state", false);
    e.target.classList.add("svg-off");
    e.target.classList.remove("svg-on");
  }
}

function setDevice(name, state) {
  fetch("/" + name + "/" + state, { method: "POST" });
}

async function checkDeviceState(name, toggleElement) {
  const device = await fetch("/" + name + "/state", { method: "GET" });
  const state = await device.text();

  if (state === "OFF") {
    toggleElement.classList.add("svg-off");
    toggleElement.classList.remove("svg-on");
    toggleElement.setAttribute("state", false);
  } else if (state === "ON") {
    toggleElement.classList.add("svg-on");
    toggleElement.classList.remove("svg-off");
    toggleElement.setAttribute("state", true);
  }
}

async function updateTemp() {
  const sensor = await fetch("/" + "temperature" + "/state", { method: "GET" });
  const state = await sensor.text();

  temp_el.innerHTML = "Temperature: " + toFloat(state) + "&#8451;";
}

async function updateHum() {
  const sensor = await fetch("/" + "humidity" + "/state", { method: "GET" });
  const state = await sensor.text();

  hum_el.innerHTML = "Humidity: " + toFloat(state) + "%";
}

function toFloat(str) {
  const num = parseFloat(str);
  return num.toFixed(2);
}

updateTemp();
updateHum();
checkDeviceState("dehumidifier", dehumidifier_state_icon);
checkDeviceState("heater", heater_state_icon);

setInterval(() => {
  updateTemp();
  updateHum();
  checkDeviceState("dehumidifier", dehumidifier_state_icon);
  checkDeviceState("heater", heater_state_icon);
}, 5000);
