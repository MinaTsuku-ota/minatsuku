// Instant Preview Feature start
// let img_obj = new Map([["img01",""],["img02",""],["img03",""]]);
var img_arr = ["","",""]
var preButton = document.getElementById("gR"),
    imageText0 = documen.getElementsByClassName("imageText")[0],
    imageText1 = documen.getElementsByClassName("imageText")[1],
    imageText2 = documen.getElementsByClassName("imageText")[2];
preButton.addEventListener("click", ReflectToPreview, false);
imageText0.addEventListener("change", imageStore, false);
imageText1.addEventListener("change", imageStore, false);
imageText2.addEventListener("change", imageStore, false);
// 画像URIを格納
function imageStore(){
  var img0 = imageText0.firstElementChild,
      img1 = imageText1.firstElementChild,
      img2 = imageText2.firstElementChild;
  if(img0){img_arr[0] = img0;}
  if(img1){img_arr[1] = img1;}
  if(img2){img_arr[2] = img2;}
  console.log(img_arr);
	if(img0 && !img1 && img2){img_arr[1]=img2; img_arr[2]="";}
	if(!img0 && img1 && img2){img_arr[0]=img1; img_arr[1]=img2; img_arr[2]="";}
	if(!img0 && img1 && !img2){img_arr[0]=img2; img_arr[1]="";}
	if(!img0 && !img1 && img2){img_arr[0]=img2; img_arr[2]="";}
	console.log(img_arr);
}
function ReflectToPreview(e){
  // デフォルトの動き(#)を無くす
  e.preventDefault();
  // タイトルの値をプレビューに渡す
  const kbtit = document.getElementById("ref_tit").value;
  document.getElementById("pre_tit").textContent = "";
  document.getElementById("pre_tit").textContent = kbtit;
  //ジャンルの値をプレビューに渡す
  const inm = document.getElementById("pre_gen"),
        i = document.getElementById("ref_gen");
  var j = i.selectedIndex,
      k = i.options[j].value,
      yjsnpi = i.options[j].text;
  inm.textContent = "";
  inm.textContent = yjsnpi;
  if(k == 0) {
    inm.textContent = "";
  }
  // 説明文をプレビューに渡す
  const kmr = document.getElementById("ref_des").value;
  document.getElementById("pre_des").textContent = "";
  document.getElementById("pre_des").textContent = kmr;
} // <-- function end
// end