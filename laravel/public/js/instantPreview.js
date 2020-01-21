// Instant Preview Feature start
	// let img_obj = new Map([["img01",""],["img02",""],["img03",""]]);
	var img_obj = {img0:"",img1:"",img2:""};
  var preButton = document.getElementById("gR");

  // 画像URIを格納
  var imageText = document.getElementsByClassName("imageText");
  for(let i=0; i<imageText.length; i++){
    
  }
  
  preButton.addEventListener("click", ReflectToPreview, false);
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
