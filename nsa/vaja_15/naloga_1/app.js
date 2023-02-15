const colorChangeBtn = document.getElementById("color-change-btn");
const colorToWhiteBtn = document.getElementById("color-to-white-btn");
const colorInput = document.getElementById("color-input");
const container = document.getElementById("container");

colorChangeBtn.addEventListener("click", () => {
    container.style.backgroundColor = colorInput.value;
})

colorToWhiteBtn.addEventListener("click", () => {
    container.style.backgroundColor = "#fff";
})
