const texts = document.getElementsByClassName("text");
const images = document.getElementsByClassName("image");

const fonts = [
  '"Times New Roman", Times, serif',
  "Arial, Helvetica, sans-serif",
  '"Lucida Console", "Courier New", monospace',
];

for (let i = 0; i < texts.length; i++) {
  texts.item(i).style.fontFamily = fonts[Math.floor(Math.random() * 3)];
}

for (let i = 0; i < images.length; i++) {
  images.item(i).style.border = "1px solid black";
}

const image1 = document.getElementById("img1");

image1.style.transform = "scale(0.5)";
