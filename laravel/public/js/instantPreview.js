// Instant Preview Feature start
var img_arr = ["","",""];
var img_test = ["","",""];
var preButton = document.getElementById("gR"),
		imageInput = document.getElementsByClassName("imageInput"),
		imageText = document.getElementsByClassName("imageText"),
    reset_js = document.getElementsByClassName("reset_js"),
    refimage = document.getElementsByClassName("refimage"),
    mod_refimage = document.getElementsByClassName("mod_refimage"),
		blackBg = document.getElementById('js-black-bg'),
		closeBtn = document.getElementById('js-close-btn'),
    popup = document.getElementById('js-popup');
    
var pre_img = document.getElementById("pre_img");
var main_gallery = document.getElementsByClassName("main-gallery")[0];
var esc = 

preButton.addEventListener("click", ReflectToPreview, false);
blackBg.addEventListener("click", ReflectToPreview);
closeBtn.addEventListener("click", ReflectToPreview);
pre_img.addEventListener("click", imageGalleryShow);
window.addEventListener("keydown", removeImageGalleryShow);

window.onload = listener();

/* イベントを監視するリスナー */
function listener(){
	for(var i=0; i<reset_js.length; i++){
		reset_js[i].addEventListener("click", {num:i, handleEvent:removeImage});}
	for(var i=0; i<imageInput.length; i++){
    if(i == 0){imageInput[0].addEventListener("change", imageStoredelay00, false);}
    if(i == 1){imageInput[1].addEventListener("change", imageStoredelay01, false);}
    if(i == 2){imageInput[2].addEventListener("change", imageStoredelay02, false);}
  }
}

/* 画像URIを格納 */
function imageStoredelay00(){setTimeout("imageStore00();",300);}
function imageStoredelay01(){setTimeout("imageStore01();",300);}
function imageStoredelay02(){setTimeout("imageStore02();",300);}
function removeImagedelay(){setTimeout("removeImage();",300);}

function imageStore00(){
  var img0 = imageInput[0];
  var img0 = img0.files[0];
  var reader = new FileReader();
  reader.addEventListener("load", function(e){
    refimage[0].src = reader.result;
    var  fileurl = reader.result;
    img_arr[0] = fileurl;
    console.log(img_arr);
  }, true);
  reader.readAsDataURL(img0);
}
function imageStore01(){
  var img1 = imageInput[1];
  var img1 = img1.files[0];
  var reader = new FileReader();
  reader.addEventListener("load", function(e){
    refimage[1].src = reader.result;
    var  fileurl = reader.result;
    img_arr[1] = fileurl;
    console.log(img_arr);
  }, true);
  reader.readAsDataURL(img1);
}
function imageStore02(){
  var img2 = imageInput[2];
  var img2 = img2.files[0];
  var reader = new FileReader();
  reader.addEventListener("load", function(e){
    refimage[2].src = reader.result;
    var  fileurl = reader.result;
    img_arr[2] = fileurl;
    console.log(img_arr);
  }, true);
  reader.readAsDataURL(img2);
}

/* 画像をリセットする */
function removeImage(e){
	img_arr[this.num] = "";
	console.log(img_arr);
}

/* プレビューに反映する */
function ReflectToPreview(e){
  /* デフォルトの動き(ページのトップに移動するやつ)を無くす */
  e.preventDefault();
  
  /* 入力チェック */

	
  /* タイトルの値をプレビューに渡す */
  const kbtit = document.getElementById("ref_tit").value;
  if(kbtit == ""){
    return alert("タイトルを入力してください！！");
  }else{
    document.getElementById("pre_tit").textContent = "";
    document.getElementById("pre_tit").textContent = kbtit;
  }
	
  /* ジャンルの値をプレビューに渡す */
  const inm = document.getElementById("pre_gen"),
        i = document.getElementById("ref_gen");
  var j = i.selectedIndex,
      k = i.options[j].value,
      yjsnpi = i.options[j].text;
      if(k == 0){
        return alert("ジャンルを選択してください！！");
      }else{
        inm.textContent = "";
        inm.textContent = yjsnpi;
        if(k == 0) {
          inm.textContent = "";
        }
      }
	
  /* 説明文をプレビューに渡す */
  const kmr = document.getElementById("ref_des").value;
  if(kmr == ""){
    return alert("説明を入力してください！！");
  }else{
    document.getElementById("pre_des").textContent = "";
    document.getElementById("pre_des").textContent = kmr;
  }

	/* 格納された画像を再配置する */
	var img0 = imageText[0].firstElementChild,
      img1 = imageText[1].firstElementChild,
      img2 = imageText[2].firstElementChild;
  img_test = img_arr.concat();
	if(img0 && !img1 && img2){img_test[1]=img_test[2]; img_test[2]="";}
	if(!img0 && img1 && img2){img_test[0]=img_test[1]; img_test[1]=img_test[2]; img_test[2]="";}
	if(!img0 && img1 && !img2){img_test[0]=img_test[1]; img_test[1]="";}
  if(!img0 && !img1 && img2){img_test[0]=img_test[2]; img_test[2]="";}
	console.log(img0,img1,img2);
	console.log(img_test);
	var refimage = document.getElementsByClassName("refimage"),
			anchorimage = document.getElementsByClassName("anchorimage"),
			mod_refimage = document.getElementsByClassName("mod_refimage");
	refimage[0].src = img_test[0];
	anchorimage[0].href = img_test[0];
	mod_refimage[0].src = img_test[0];
	refimage[1].src = img_test[1];
	anchorimage[1].href = img_test[1];
	mod_refimage[1].src = img_test[1];
	refimage[2].src = img_test[2];
	anchorimage[2].href = img_test[2];
	mod_refimage[2].src = img_test[2];

	/* プレビュー画面 */
	if(document.getElementsByClassName("hogeshow")[0]){
		main_gallery.classList.remove("hogeshow");
	}else{
		popup.classList.toggle("is-show");
	}
	// if(!document.getElementsByClassName("hogeshow")){
	// 	popup.classList.add('is-show');
	// 	// return;
	// }else{main_gallery.classList.remove("hogeshow");}
} // <-- function end

function imageGalleryShow(){
	main_gallery.classList.add("hogeshow");
}

function removeImageGalleryShow(key){
	if(document.getElementsByClassName("is-show")[0] && document.getElementsByClassName("hogeshow")[0]){
		if(key.keyCode == 27 || key.keyCode == 8 || key.keyCode == 46){
			main_gallery.classList.remove("hogeshow");
		}
	}else if(document.getElementsByClassName("is-show")[0] && !document.getElementsByClassName("hogeshow")[0]){
		if(key.keyCode == 27 || key.keyCode == 8 || key.keyCode == 46){
			popup.classList.remove("is-show");
		}
	}
}
// end
