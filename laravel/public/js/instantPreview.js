function titleReflect() {
    const kbtit = document.getElementById("ref_tit").value;
    document.getElementById("pre_tit").textContent = "";
    document.getElementById("pre_tit").textContent = kbtit;
}

function genreReflect() {
    const inm = document.getElementById("pre_gen");
    const i = document.getElementById("ref_gen");
    var j = i.selectedIndex;
    var k = i.options[j].value;
    var yjsnpi = i.options[j].text;

    inm.textContent = "";
    inm.textContent = yjsnpi;
    if (k == 0) {
        inm.textContent = "";
    }
}

function descriptionReflect() {
    const kmr = document.getElementById("ref_des").value;
    document.getElementById("pre_des").textContent = "";
    document.getElementById("pre_des").textContent = kmr;
}

function imageReflect() {
    // window.alert("geting OK.");
}

var ppTitEvn = document.getElementById("ref_tit");
var ppGenEvn = document.getElementById("ref_gen");
var ppDesEvn = document.getElementById("ref_des");
var ppImgEvn = document.getElementById("input_td");

ppTitEvn.addEventListener("keyup", titleReflect, false);
ppGenEvn.addEventListener("change", genreReflect, false);
ppDesEvn.addEventListener("keyup", descriptionReflect, false);
ppImgEvn.addEventListener("click", imageReflect, false);