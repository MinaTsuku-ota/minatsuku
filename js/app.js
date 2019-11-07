$(function () {
  $(".b1").hide();
  $('.f1').hide();
  $('.f1').each(function (i) {
    $(this).delay(1650 * i).fadeIn(1650);
  });
});

$(function() {
  setTimeout(function() {
  $(".b1").fadeIn(800);
  }, 3300);
});