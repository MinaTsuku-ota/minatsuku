{{-- デバッグ用 --}}
{{-- {{ dd($contact) }} --}}

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
</head>
<body>
<h3>問い合わせ内容を以下で受け取りました。</h3>
<hr/>
<div>
	ニックネーム：{{ $name }}<br/>
	{{-- タイトル：{{ $contact['title'] }}<br/> --}}
	本文：<br/>
	{{ $contact['body'] }}
</div>
</body>
</html>
