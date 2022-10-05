

function changeImage() {
  var image = document.getElementById('myImage');
  if (image.src.match("https://www.w3schools.com/js/pic_bulboff.gif")) {
    image.src = "https://www.w3schools.com/js/pic_bulbon.gif";
  } else {
    image.src = "https://www.w3schools.com/js/pic_bulboff.gif";
  }
}
