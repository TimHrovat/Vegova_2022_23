import {
    setGrayscale,
    setTreshold,
    removeColorChannels,
    enhanceColorChannel,
    setBrightness,
    convertTo2D,
    convertToOriginal,
    applyBlur,
    applyMatrix,
    sharpening,
    unsharpMasking,
    subtractImages,
    sumImages,
    generateBucketsByColor,
} from "./functions.js";
import { updateChart } from "./chart.js";

const fileInput = document.getElementById("file-input");
const img = document.getElementById("pic");
const finalImg = document.getElementById("final-img");
const applyBtn = document.getElementById("btn");
const btnUndo = document.getElementById("btn-undo");
const brightnessInput = document.getElementById("brightness-input");
const btnRemoveAll = document.getElementById("btn-remove-all");
const filterButtons = document.querySelectorAll(".apply-filter-button");
const stackContainer = document.getElementById("stack-container");
let stack = [];

fileInput.addEventListener("change", (e) => {
    img.src = URL.createObjectURL(e.target.files[0]);
    finalImg.src = "";
    document
        .getElementsByClassName("filter-container")[0]
        .classList.remove("hidden");
});

brightnessInput.addEventListener("change", (e) => {
    const span = document.getElementById("brightness-val");
    span.innerHTML = e.target.value;
});

filterButtons.forEach((filterButton) => {
    filterButton.addEventListener("click", (e) => {
        stack.push(e.target.getAttribute("data-fname"));
        const stackElement = document.createElement("div");
        stackElement.innerHTML =
            stack.length + " - " + e.target.getAttribute("data-fname");
        stackContainer.appendChild(stackElement);
        updateFilterCount();
    });
});

btnRemoveAll.addEventListener("click", () => {
    stack = [];
    updateFilterCount();
    while (stackContainer.firstChild) {
        stackContainer.removeChild(stackContainer.lastChild);
    }
});

btnUndo.addEventListener("click", () => {
    stack.pop();
    stackContainer.removeChild(stackContainer.lastChild);
    updateFilterCount();
});

applyBtn.addEventListener("click", () => {
    if (img.src === "") return;

    if (finalImg.lastChild) finalImg.removeChild(finalImg.lastChild);

    finalImg.classList.add("hidden");

    finalImg.src = "";

    showLoader();
    applyBtn.disabled = true;

    setTimeout(() => {
        const tmpCanvas = document.createElement("canvas");
        const tmpCtx = tmpCanvas.getContext("2d");

        tmpCanvas.height = img.naturalHeight;
        tmpCanvas.width = img.naturalWidth;

        tmpCtx.drawImage(img, 0, 0, img.naturalWidth, img.naturalHeight);

        const imgData = tmpCtx.getImageData(
            0,
            0,
            img.naturalWidth,
            img.naturalHeight
        ); //podatki o sliki
        const data = imgData.data;

        applyFilters(data, img.naturalWidth);

        tmpCtx.putImageData(imgData, 0, 0);

        var image = new Image();
        image.id = "pic2";
        image.src = tmpCanvas.toDataURL();
        finalImg.appendChild(image);

        updateChart(data, img.naturalWidth);

        document.getElementById("loader").setAttribute("attr", "hidden");

        applyBtn.disabled = false;
        hideLoader();
        finalImg.classList.remove("hidden");
    }, 1);
});

function showLoader() {
    const loader = document.getElementById("loader");
    loader.style.width = `${img.width}px`;
    loader.style.height = `${img.height}px`;
    loader.classList.remove("hidden");
    loader.classList.add("block");
}

function hideLoader() {
    const loader = document.getElementById("loader");
    loader.classList.add("hidden");
    loader.classList.remove("block");
}

function updateFilterCount() {
    const span = document.getElementById("filter-cnt");
    span.innerHTML = stack.length;
}

function applyFilters(data, width) {
    stack.forEach((el) => {
        switch (el) {
            case "grayscale":
                setGrayscale(data);
                break;
            case "threshold":
                setTreshold(data, 128);
                break;
            case "box-blur":
                const blur = applyBlur(
                    data,
                    img.naturalWidth,
                    [
                        [1, 2, 1],
                        [2, 4, 2],
                        [1, 2, 1],
                    ],
                    16
                );
                convertToOriginal(blur, data);
                break;
            case "sharpening":
                const sharpenedImg = sharpening(data, img.naturalWidth);
                convertToOriginal(sharpenedImg, data);
                break;
            case "unsharp-masking":
                const unsharpedImg = unsharpMasking(data, img.naturalWidth);
                convertToOriginal(unsharpedImg, data);
                break;
            case "rc-red":
            case "rc-green":
            case "rc-blue":
                removeColorChannels(data, {
                    red: el.split("-")[1] === "red" ? true : false,
                    green: el.split("-")[1] === "green" ? true : false,
                    blue: el.split("-")[1] === "blue" ? true : false,
                });
                break;
            case "ec-red":
            case "ec-green":
            case "ec-blue":
                enhanceColorChannel(data, {
                    red: el.split("-")[1] === "red" ? true : false,
                    green: el.split("-")[1] === "green" ? true : false,
                    blue: el.split("-")[1] === "blue" ? true : false,
                });
                break;
            case "laplacian":
                const appliedMatrix = applyMatrix(data, img.naturalWidth, [
                    [0, 1, 0],
                    [1, -4, 1],
                    [0, 1, 0],
                ]);
                convertToOriginal(appliedMatrix, data);
                break;
        }
    });

    setBrightness(data, Number(brightnessInput.value));
}

//       setGrayscale(data);
//       setTreshold(data, 150);
//       removeColorChannels(data, { red: true, green: false, blue: true });
//       enhanceColorChannel(data, { red: false, green: false, blue: false });
//       setBrightness(data, 0.8);

//     applyBlur(
//         data,
//         img.naturalWidth,
//         [
//             [1, 2, 1],
//             [2, 4, 2],
//             [1, 2, 1],
//         ],
//         16
//     );

//     const appliedMatrix = applyMatrix(data, img.naturalWidth, [
//         [0, 1, 0],
//         [1, -4, 1],
//         [0, 1, 0],
//     ]);

//     const sharpenedImg = unsharpMasking(data, img.naturalWidth);
// };
