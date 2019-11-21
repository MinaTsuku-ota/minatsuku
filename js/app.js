function imgChange() {
  var now = new Date();
  var currentTime =  now.getHours();
  var yjsnpi = document.getElementById("yarimasunee")
  if (currentTime >= 4 && currentTime < 15) {
    yjsnpi.classList.remove("nightBG"); yjsnpi.classList.add("morningBG");
  } else if(currentTime >= 15 && currentTime < 19) {
    yjsnpi.classList.remove("morningBG"); yjsnpi.classList.add("afternoonBG");
  } else {
    yjsnpi.classList.remove("afternoonBG"); yjsnpi.classList.add("nightBG");
  }
}