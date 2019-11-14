$(function () {
  $('.f1').hide();
  $('.f1').each(function (i) {
    $(this).delay(1000 * i).fadeIn(1000);
  });
});
