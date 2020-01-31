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

var $indexFadeAnime = $.Deferred(function($indexFadeAnime) {
  $indexFadeAnime.then(anime01).then(anime02).then(anime03)});

$indexFadeAnime.resolve();
function anime01() {
  return $(function() {
    $("#indexTitle div").hide();
    $("#indexButton div").hide();
  });
}
function anime02() {
  return $(function() {
    $("#indexTitle div").fadeIn(2000);
    });
}
function anime03() {
  return $(function() {
    $("#indexButton div").delay(1000).fadeIn(700);
    });
}
