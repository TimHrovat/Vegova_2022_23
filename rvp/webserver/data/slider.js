const tempSlider = document.getElementById("temperature-slider");
const humSlider = document.getElementById("humidity-slider");
const tempHystSlider = document.getElementById("temperature-hyst-slider");
const humHystSlider = document.getElementById("humidity-hyst-slider");

const tempSliderValueContainer = document.getElementById("selected-temp");
const humSliderValueContainer = document.getElementById("selected-hum");
const tempHystSliderValueContainer = document.getElementById("selected-hyst-temp");
const humHystSliderValueContainer = document.getElementById("selected-hyst-hum");

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

tempSlider.addEventListener("change", () => {
    setTempSliderContainer();
});

humSlider.addEventListener("change", () => {
    setHumSliderContainer();
})

tempHystSlider.addEventListener("change", () => {
    setTempHystSliderContainer();
})

humHystSlider.addEventListener("change", () => {
    setHumHystSliderContainer();
})

setTempSliderContainer();
setHumSliderContainer();
setTempHystSliderContainer();
setHumHystSliderContainer();