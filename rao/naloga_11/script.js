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
  setBrightness(data, 0.8);

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
