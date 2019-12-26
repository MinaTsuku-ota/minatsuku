$(function () {
	// ドロップ時の処理
	$('.input_span').on('drop', function (e) {
		console.log('dropped');
		e.stopPropagation(); // 後続へのイベント伝播を止める
		e.preventDefault(); // イベントのデフォルト処理をキャンセルする

		// $('#input_file')のchangeイベントが発火
		$('#Area0')[0].files = e.originalEvent.dataTransfer.files;

		//$(this).closest('form').trigger('submit'); // submitを実行
	});

	// クリック時の処理
	$('.input_span').on('click', function (e) {
		console.log('clicked');
		e.stopPropagation(); // 後続へのイベント伝播を止める
		e.preventDefault(); // イベントのデフォルト処理をキャンセルする
	});
});

$('#Area0').on("change", function (e) {
	// バリデーション等
});

// form以外でファイルがドロップされた場合、ファイルが開いてしまうのを防ぐ
$(document).on('dragenter', function (e) {
	e.stopPropagation();
	e.preventDefault();
});
$(document).on('dragover', function (e) {
	e.stopPropagation();
	e.preventDefault();
});
$(document).on('drop', function (e) {
	e.stopPropagation();
	e.preventDefault();
});