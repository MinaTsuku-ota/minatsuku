//$('p').hide().fadeIn(2000);

$(function () {
  // ①
  $('.f1').hide();
  
  // ②
  $('.f1').each(function (i) {
  // ③
    $(this).delay(1000 * i).fadeIn(1500);
  });
});