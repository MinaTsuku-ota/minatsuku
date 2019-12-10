function titleReflect() {
  const kbtit = document.getElementById("title").value;
  document.getElementById("title2").textContent = "";
  document.getElementById("title2").textContent = kbtit;
}

function genreReflect() {
  const inm = document.getElementById("genre2");
  const i = document.getElementById("genre");
  var j = i.selectedIndex;
  var k = i.options[j].value;
  var yjsnpi = i.options[j].text;
  inm.textContent = "";
  inm.textContent = yjsnpi;
  if(k == 0) {
    inm.textContent = "";
  }
}

function departmentReflect() {
  const inm = document.getElementById("department2");
  var i = document.getElementById("department");
  var j = i.selectedIndex;
  var k = i.options[j].value;
  var mur = i.options[j].text;
  inm.textContent = "";
  inm.textContent = mur;
  if(k == 0) {
    inm.textContent = "";
  }
}

function descriptionReflect() {
  const kmr = document.getElementById("description").value;
  document.getElementById("description2").textContent = "";
  document.getElementById("description2").textContent = kmr;
}

var ppTitEvn = document.getElementById("title");
var ppGenEvn = document.getElementById("genre");
var ppDepEvn = document.getElementById("department");
var ppDesEvn = document.getElementById("description");

ppTitEvn.addEventListener("keyup", titleReflect, false);
ppGenEvn.addEventListener("change", genreReflect, false);
ppDepEvn.addEventListener("change", departmentReflect, false);
ppDesEvn.addEventListener("keyup", descriptionReflect, false);