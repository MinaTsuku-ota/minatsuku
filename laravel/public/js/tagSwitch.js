document.addEventListener('DOMContentLoaded', function(){
	// タブに対してクリックイベントを適用
	const tabs = document.getElementsByClassName('article-tab');
	for(let i = 0; i < tabs.length; i++) {
			tabs[i].addEventListener('click', tabSwitch);
	}

	// タブをクリックすると実行する関数
	function tabSwitch(){
			// タブのclassの値を変更
			document.getElementsByClassName('tag-active')[0].classList.remove('tag-active');
			this.classList.add('tag-active');
			// コンテンツのclassの値を変更
			document.getElementsByClassName('panel-show')[0].classList.remove('panel-show');
			const arrayTabs = Array.prototype.slice.call(tabs);
			const index = arrayTabs.indexOf(this);
			document.getElementsByClassName('article-panel')[index].classList.add('panel-show');
	}
});