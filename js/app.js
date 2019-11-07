$(function () {
  $('.f1').hide();
  $('.f1').each(function (i) {
    $(this).delay(1650 * i).fadeIn(2000);
  });
});
