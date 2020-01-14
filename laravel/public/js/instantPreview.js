// Instant Preview Feature start
var preButton = document.getElementById("gR"),
		img_obj = {img0:"",img1:"",img2:""};

preButton.addEventListener("click", ReflectToPreview, false);
function ReflectToPreview(e){
	// デフォルトの動き(#)を無くす
	e.preventDefault();
	// タイトルの値をプレビューに渡す
	const kbtit = document.getElementById("ref_tit").value;
	document.getElementById("pre_tit").textContent = "";
	document.getElementById("pre_tit").textContent = kbtit;
	//ジャンルの値をプレビューに渡す
	var inm = document.getElementById("pre_gen"),
			i = document.getElementById("ref_gen"),
			j = i.selectedIndex,
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

// 画像取得
var Area0 = document.getElementById("Area0"),
		Area1 = document.getElementById("Area1"),
		Area2 = document.getElementById("Area2");
// end