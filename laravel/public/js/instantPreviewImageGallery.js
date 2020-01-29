$(function(){
	// var $main_gallery = $(".main-gallery").flickity({cellSelector: ".modImgPosition"});
	$("#pre_img").on("click", function(){
			var flk = new Flickity('.main-gallery',{
				autoPlay: true,
				wrapAround: true
			});
	})
});