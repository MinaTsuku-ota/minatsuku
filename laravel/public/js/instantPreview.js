// Instant Preview Feature start
	// let img_obj = new Map([["img01",""],["img02",""],["img03",""]]);
	var img_obj = {img0:"",img1:"",img2:""};
  var preButton = document.getElementById("gR");
  
  preButton.addEventListener("click", ReflectToPreview, false);
  function ReflectToPreview(e){
    // デフォルトの動き(#)を無くす
    e.preventDefault();
    // タイトルの値をプレビューに渡す
    const kbtit = document.getElementById("ref_tit").value;
    document.getElementById("pre_tit").textContent = "";
    document.getElementById("pre_tit").textContent = kbtit;
    //ジャンルの値をプレビューに渡す
    const inm = document.getElementById("pre_gen");
    const i = document.getElementById("ref_gen");
    var j = i.selectedIndex;
    var k = i.options[j].value;
    var yjsnpi = i.options[j].text;
    inm.textContent = "";
    inm.textContent = yjsnpi;
    if(k == 0) {
      inm.textContent = "";
    }
    // 説明文をプレビューに渡す
    const kmr = document.getElementById("ref_des").value;
    document.getElementById("pre_des").textContent = "";
    document.getElementById("pre_des").textContent = kmr;
		// 画像をプレビューに渡す
    var img0 = document.querySelector("#input_td > span:nth-child(1) > div").firstElementChild;
    var img1 = document.querySelector("#input_td > span:nth-child(2) > div").firstElementChild;
    var img2 = document.querySelector("#input_td > span:nth-child(3) > div").firstElementChild;
    var pre0 = document.getElementsByClassName("preImgPosition1");
    var pre1 = document.getElementsByClassName("preImgPosition2");
    var pre2 = document.getElementsByClassName("preImgPosition3");
    var span = document.createElement("span");
    // 短くしたい
		var files = e.target.files;
		var reader = new FileReader;
    if(img0 && !img1 && !img2){
      img_obj.set("img01",img0);
      img_obj.set("img02","");
      img_obj.set("img03","");
    }else if(img0 && img1 && !img2){
      img_obj.set("img01",img0);
      img_obj.set("img02",img1);
      img_obj.set("img03","");
    }else if(img0 && img1 && img2){
      img_obj.set("img01",img0);
      img_obj.set("img02",img1);
      img_obj.set("img03",img2);
    }else if(!img0 && img1 && !img2){
      img_obj.set("img01","");
      img_obj.set("img02",img1);
      img_obj.set("img03","");
    }else if(!img0 && img1 && img2){
      img_obj.set("img01","");
      img_obj.set("img02",img1);
      img_obj.set("img03",img2);
    }else if(!img0 && !img1 && img2){
      img_obj.set("img01","");
      img_obj.set("img02","");
      img_obj.set("img03",img2);
    }else if(!img0 && img1 && !img2){
      img_obj.set("img01","");
      img_obj.set("img02",img1);
      img_obj.set("img03","");
    }else if(img0 && !img1 && img2){
      img_obj.set("img01",img0);
      img_obj.set("img02","");
      img_obj.set("img03",img2);
    }else{
      img_obj.set([["img01",""],["img02",""],["img03",""]]);
    }
    console.log(img_obj.entries());
  } // <-- function end
  // end