i = 0;
imageLocation = "../image/";
img = ["aozora.jpg", "yuugata.jpg", "yoru.jpg"];

function imgChange() {
  i++;
  if(i >= img.length) {
    i = 0;
  }
  document.body.background = imageLocation + img[i];
}
function changeTimer() {
  document.body.background = imageLocation + img[i];
  changeTimer = setInterval("imgChange()", 10000);
}