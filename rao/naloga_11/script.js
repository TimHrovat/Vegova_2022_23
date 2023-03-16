window.onload = function () {
    const canvas = document.getElementById("canvas");

    const ctx = canvas.getContext("2d");

    const img = document.getElementById("pic");

    canvas.width = img.naturalWidth;
    canvas.height = img.naturalHeight;

    ctx.drawImage(img, 0, 0);

    const imgData = ctx.getImageData(0, 0, img.naturalWidth, img.naturalHeight); //podatki o sliki
    const data = imgData.data; //pridobimo array pikslov

    //   setGrayscale(data);
    //   setTreshold(data, 150);
    //   removeColorChannels(data, { red: true, green: false, blue: true });
    //   enhanceColorChannel(data, { red: false, green: false, blue: false });
    //   setBrightness(data, 0.8);

    boxBlur(
        data,
        img.naturalWidth,
        [
            [1, 2, 1],
            [2, 4, 2],
            [1, 2, 1],
        ],
        16
    );

    ctx.putImageData(imgData, 0, 0);
};

function setGrayscale(data) {
    for (let i = 0; i < data.length; i = i + 4) {
        const val = 0.299 * data[i] + 0.587 * data[i] + 0.114 * data[i];
        data[i] = val;
        data[i + 1] = val;
        data[i + 2] = val;
        continue;
    }
}

function setTreshold(data, threshold) {
    for (let i = 0; i < data.length; i = i + 4) {
        let val = 0.299 * data[i] + 0.587 * data[i] + 0.114 * data[i];
        val = val > threshold ? 255 : 0;
        data[i] = val;
        data[i + 1] = val;
        data[i + 2] = val;
        continue;
    }
}

function removeColorChannels(data, colorObject) {
    const arr = ["red", "green", "blue"];
    for (let i = 0; i < data.length; i++) {
        if ((i + 1) % 4 === 0) continue;

        data[i] = colorObject[arr[i % 4]] ? 0 : data[i];
    }
}

function enhanceColorChannel(data, colorObject) {
    const arr = ["red", "green", "blue"];
    for (let i = 0; i < data.length; i++) {
        if ((i + 1) % 4 === 0) continue;

        data[i] = colorObject[arr[i % 4]] ? 255 : data[i];
    }
}

function setBrightness(data, brightness) {
    for (let i = 0; i < data.length; i++) {
        if ((i + 1) % 4 === 0) continue;

        data[i] = brightness * data[i];
    }
}

function convertTo2D(data, imgWidth) {
    const objectArr = [[]];

    let row = 0;
    for (let i = 0; i < data.length; i = i + 4) {
        objectArr[row].push({
            R: data[i],
            G: data[i + 1],
            B: data[i + 2],
            A: data[i + 3],
        });

        if (i / 4 === imgWidth * (row + 1)) {
            objectArr.push([]);
            row++;
        }
    }

    return objectArr;
}

function convertToOriginal(objectArr, data) {
    // const data = [];
    let i = 0;
    objectArr.forEach((el) => {
        el.forEach((value) => {
            data[i] = value.R;
            data[i + 1] = value.G;
            data[i + 2] = value.B;
            data[i + 3] = value.A;
            i += 4;
        });
    });
}

function boxBlur(data, imgWidth, matrix, div) {
    let objectArr = convertTo2D(data, imgWidth);

    console.log(objectArr);

    const arr = objectArr.map((el, y) => {
        return el.map((value, x) => {
            const edgeOffset = (matrix.length - 1) / 2;
            if (
                // TODO: fix width / heights
                y + edgeOffset >= objectArr.length - 1 ||
                x + edgeOffset >= el.length - 1 ||
                x < edgeOffset ||
                y < edgeOffset
            )
                return value;

            const color = { R: 0, G: 0, B: 0, A: 255 };

            matrix.forEach((m, my) => {
                m.forEach((mult, mx) => {
                    const pixel =
                        objectArr[y + my - edgeOffset][x + mx - edgeOffset];
                    color.R += pixel.R * mult;
                    color.G += pixel.G * mult;
                    color.B += pixel.B * mult;
                });
            });

            color.R /= div;
            color.G /= div;
            color.B /= div;

            return color;
        });
    });

    convertToOriginal(arr, data);
}
