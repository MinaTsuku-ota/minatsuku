function ppp(){
	// URL解析(練習用)
	// 一旦中止、bladeの変更だけでできそうなので・・・(;^o^)<蛇足...
	var murl = /http(s)?:\/\/localhost\/([\w- ./?%&=]*)/gi;
	var htsrc = document.body.innerHTML;
	var result = htsrc.match(murl); console.log(result);
	// ページネーション機能
	const purl = /http(s)?:\/\/([\w-]*)\/articles([\d]*)[?]id=([1-9]+)/gi;
	var result2 = htsrc.match(purl); console.log(result2);
	// var change_urls = [];
	// for(var i=0, len=result2.length; i<len; i++){
	// }
}
window.onload = ppp;

document.addEventListener('DOMContentLoaded', function(){
	// genreタブに対してイベントリスナー
	const tabs = document.getElementsByClassName('article-tab');
	for(let i=0; i<tabs.length; i++) {
		tabs[i].addEventListener('click', tabSwitch);
	}
	
	function tabSwitch(){
		// genreタブの切り替え(いらなくね？)
		document.getElementsByClassName('tag-active')[0].classList.remove('tag-active');
		this.classList.add('tag-active');
		// toukouPanelの切り替え
		document.getElementsByClassName('panel-show')[0].classList.remove('panel-show');
		const arrayTabs = Array.prototype.slice.call(tabs);
		const index = arrayTabs.indexOf(this);
		document.getElementsByClassName('article-panel')[index].classList.add('panel-show');
	}
});
