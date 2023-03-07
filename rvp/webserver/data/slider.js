const tempSlider = document.getElementById("temperature-slider");
const humSlider = document.getElementById("humidity-slider");
const tempHystSlider = document.getElementById("temperature-hyst-slider");
const humHystSlider = document.getElementById("humidity-hyst-slider");

const tempSliderValueContainer = document.getElementById("selected-temp");
const humSliderValueContainer = document.getElementById("selected-hum");
const tempHystSliderValueContainer =
  document.getElementById("selected-hyst-temp");
const humHystSliderValueContainer =
  document.getElementById("selected-hyst-hum");

function setTempSliderContainer() {
  tempSliderValueContainer.innerHTML = tempSlider.value;
}

function setHumSliderContainer() {
  humSliderValueContainer.innerHTML = humSlider.value;
}

function setTempHystSliderContainer() {
  tempHystSliderValueContainer.innerHTML = tempHystSlider.value;
}

function setHumHystSliderContainer() {
  humHystSliderValueContainer.innerHTML = humHystSlider.value;
}

async function setHyst(deviceName, value) {
  fetch("/" + deviceName + "/set-hyst?value=" + value, { method: "GET" });
}

async function setWantedValue(deviceName, value) {
  fetch("/" + deviceName + "/set-wanted-value?value=" + value, {
    method: "GET",
  });
}

async function checkSliderValues(name, toggleElement) {
  const sensor = await fetch("/slider/states", { method: "GET" });

  if (!sensor) return;

  const state = await JSON.parse(await sensor.text());

  if (!state) return;

  tempSlider.value = state["temp_slider"];
  humSlider.value = state["hum_slider"];
  tempHystSlider.value = state["temp_hyst"];
  humHystSlider.value = state["hum_hyst"];

  setTempSliderContainer();
  setHumSliderContainer();
  setTempHystSliderContainer();
  setHumHystSliderContainer();
}

tempSlider.addEventListener("change", () => {
  setTempSliderContainer();
  setWantedValue("heater", tempSlider.value);
});

humSlider.addEventListener("change", () => {
  setHumSliderContainer();
  setWantedValue("dehumidifier", humSlider.value);
});

tempHystSlider.addEventListener("change", () => {
  setTempHystSliderContainer();
  setHyst("heater", tempHystSlider.value);
});

humHystSlider.addEventListener("change", () => {
  setHumHystSliderContainer();
  setHyst("dehumidifier", humHystSlider.value);
});

checkSliderValues();

setInterval(() => {
  checkSliderValues();
}, 5000);
