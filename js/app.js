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

$(function() {
  $("#indexTitle div").hide();
  $("#indexTitle div").each(function(i) {
    $(this).delay(1000*i).fadeIn(1000);
  });
});

// var exitCount = 0;
// var elemsCount = 0;
// var indexButton = $("#indexButton")
// function repeatShow(indexButton) {
//   elemsCount = indexButton.length;
//   elems$.eq(exitCount).show("slow", function() {
//     exitCount++;
//     if(exitCount < elemsCount) {
//       repeatShow(elems$);
//     }
//   });
// }

// $(function() {
//   repeatShow($("indexButton button-01"));
// });