function aaa(){
	// URL解析(練習用)
	// 一旦中止、bladeの変更だけでできそうなので・・・(;^o^)<蛇足...
	var murl = /http(s)?:\/\/localhost\/([\w- ./?%&=]*)/gi,
		murl2 = /http(s)?:\/\/localhost:([0-9])*\/([\w- ./?%&=]*)/gi;
	var htsrc = document.body.innerHTML;
	var result = htsrc.match(murl),
		result0 = htsrc.match(murl2);
		if(result0[0].match(/:8080/g)){
			console.log(result0);
		}else{console.log(result);}
	// ページネーション機能
	const purl = /http(s)?:\/\/([\w-]*)\/articles([\d]*)[?]id=([1-9]+)/gi;
	var result2 = htsrc.match(purl); console.log(result2);
	// var change_urls = [];
	// for(var i=0, len=result2.length; i<len; i++){
	// }
}
window.onload = aaa;

document.addEventListener('DOMContentLoaded', function(){
	// genreタブに対してイベントリスナー
	var toukouPanel = document.getElementsByClassName('toukouPanel'),
			panel_show = document.getElementsByClassName('panel-show'),
			article_tab = document.getElementsByClassName('article-tab'),
			tag_active = document.getElementsByClassName('tag-active'),
			radio = document.getElementById("radio"),
			tabs = radio.tabs;
	for(let i=0; i<article_tab.length; i++) {
		article_tab[i].addEventListener('click', tabSwitch, false);
	}
	
	function tabSwitch(){
		// for(var i=0; i<4; i++){
		// 	tabs[i].checked = false;
		// }
		// genreタブの切り替え(既にcheckedのcssが存在していたので、addClassは飾りです)
		// this.classList.add('tag-active');
		// toukouPanelの切り替え
		panel_show[0].classList.remove('panel-show');
		var arrayTabs = Array.prototype.slice.call(article_tab),
				index = arrayTabs.indexOf(this);
		toukouPanel[index].classList.add('panel-show');
	}
});