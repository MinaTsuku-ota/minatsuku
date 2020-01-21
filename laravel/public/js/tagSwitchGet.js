/* ページネーション機能
 * 画面遷移してきた後に処理 */
function ppp(){
	// [form id="radio"]の[name="tabs"]を取っている
	var radio = document.getElementById("radio"),
			article_tab = document.getElementsByClassName('article-tab'),
			// tag_active = document.getElementsByClassName('tag-active'),
			// panel_show = document.getElementsByClassName('panel-show'),
			toukouPanel = document.getElementsByClassName('toukouPanel'),
			elems = radio.tabs,
			param = document.location.search,
			param = param.substr(1,3);
	// for(var i=0; i<4; i++){
	// 	elems[i].checked = false;
	// }
	// elems[0].checked = false;
	// panel_show[0].classList.remove('panel-show');
	// tag_active.classList.remove('tag-active');
	console.log(param);
	/* 既にcheckedのcssが存在していたので、add-Classは飾りです */
  switch (param) {
    case "web":
			elems[1].checked = true;
			article_tab[1].classList.add('tag-active');
			toukouPanel[1].classList.add('panel-show');
      break;
    case "pho":
			elems[2].checked = true;
			article_tab[2].classList.add('tag-active');
			toukouPanel[2].classList.add('panel-show');
      break;
    case "vid":
			elems[3].checked = true;
			article_tab[3].classList.add('tag-active');
			toukouPanel[3].classList.add('panel-show');
			break;
		default:
			elems[0].checked = true;
			article_tab[0].classList.add('tag-active');
			toukouPanel[0].classList.add('panel-show');
	}
}
// genreタブをクリックした時のイベントハンドラー
window.onload = ppp;