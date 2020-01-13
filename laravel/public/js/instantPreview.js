// Instant Preview Feature start
	var img_obj = {img0:"",img1:"",img2:""};
  var preButton = document.getElementById("gR");
  
  preButton.addEventListener("click", ReflectToPreview, false);
  function ReflectToPreview(e){
    // デフォルトの動き(#)を無くす
    e.preventDefault();
    // タイトルの値をプレビューに渡す
    const kbtit = document.getElementsByClassName("ref_tit").value;
    document.getElementById("pre_tit").textContent = "";
    document.getElementById("pre_tit").textContent = kbtit;
    //ジャンルの値をプレビューに渡す
    const inm = document.getElementById("pre_gen");
    const i = document.getElementsByClassName("ref_gen");
    var j = i.selectedIndex;
    var k = i.options[j].value;
    var yjsnpi = i.options[j].text;
    inm.textContent = "";
    inm.textContent = yjsnpi;
    if(k == 0) {
      inm.textContent = "";
    }
    // 説明文をプレビューに渡す
    const kmr = document.getElementsByClassName("ref_des").value;
    document.getElementById("pre_des").textContent = "";
    document.getElementById("pre_des").textContent = kmr;
		// 画像をプレビューに渡す
		var files = e.target.files;
		var reader = new FileReader;
  } // <-- function end
  // end