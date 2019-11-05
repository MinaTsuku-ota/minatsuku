//$('p').hide().fadeIn(2000);

$(function () {
  // ①
  $('.f1').hide();
  
  // ②
  $('.f1').each(function (i) {
  // ③
    $(this).fadeIn(1500);
  });
});
$(function () {
  // ①
  $('.f6').hide();
  
  // ②
  $('.f6').each(function (i) {
  // ③
    $(this).fadeIn(3000);
  });
});
$(function () {
  // ①
  $('.f5').hide();
  
  // ②
  $('.f5').each(function (i) {
  // ③
    $(this).fadeIn(7500);
  });
});