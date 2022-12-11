const temp_el = document.getElementById("temp-state");
const hum_el = document.getElementById("humidity-state");
const heater = document.getElementById("heater");
const humidifier = document.getElementById("humidifier");

heater.addEventListener("change", setEventListener);
humidifier.addEventListener("change", setEventListener);

function setEventListener(e) {
  e.preventDefault();
  const currentState = e.target.checked;

  if (currentState) {
    setDevice(e.target.name, "on");
  } else {
    setDevice(e.target.name, "off");
  }
}

function setDevice(name, state) {
  fetch("/" + name + "/" + state, { method: "POST" });
}

async function checkDeviceState(name, toggleElement) {
  const device = await fetch("/" + name + "/state", { method: "GET" });
  const state = await device.text();

  if (state === "OFF") toggleElement.checked = false;
  else if (state === "ON") toggleElement.checked = true;
}

async function updateTemp() {
  const sensor = await fetch("/" + "temperature" + "/state", { method: "GET" });
  const state = await sensor.text();

  temp_el.innerHTML = "Temperature: " + toFloat(state) + "&#8451;";
  console.log(state);
}

async function updateHum() {
  const sensor = await fetch("/" + "humidity" + "/state", { method: "GET" });
  const state = await sensor.text();

  hum_el.innerHTML = "Humidity: " + toFloat(state) + "%";
  console.log(state);
}

function toFloat(str) {
  const num = parseFloat(str);
  return num.toFixed(2);
}

updateTemp();
updateHum();
checkDeviceState("humidifier", humidifier);
checkDeviceState("heater", heater);

setInterval(() => {
  updateTemp();
  updateHum();
  checkDeviceState("humidifier", humidifier);
  checkDeviceState("heater", heater);
}, 5000);
