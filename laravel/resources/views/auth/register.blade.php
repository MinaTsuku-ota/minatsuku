<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title>みなツク -MINATUKU-</title>
	<link rel="stylesheet" href="/css/normalize.css">
	<link rel="stylesheet" href="/css/sinki.css">
	<link rel="shortcut icon" href="/image/favicon.png" type="image/png">
	<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
</head>
<body>

	<header class="header clearfix">
		<div class="header-left clearfix">
		<a href="#"><img src="/image/touroku_daimei.png" class="sinki_daimei" alt="新規登録"></a>
		</div>
	</header>

	<main>
		<div class="header clearfix dummy">
			<div class="header-left clearfix">
				<a href="#"><img src="../image/touroku_daimei.png" class="sinki_daimei" alt="新規登録"></a>
			</div>
		</div>

		<section>
			<div id="sinki_syoudai">
				<img src="/image/sinki_syoudai.png" alt="はじめの一歩" class="syoudai">
			</div>

			<form class="clearfix" method="POST" action="{{ route('register') }}">
				@csrf
				<dl>
					<dt class="daimei"><label for="name">ニックネーム</label></dt>
					<dd><input type="text" name="name" id="name" class="nyuuryoku" required value="{{ old('name') }}" autofocus></dd>
					<dt class="daimei"><label for="password">パスワード</label></dt>
                    <dd><input type="password" name="password" id="password" class="nyuuryoku" required></dd>
                    <dt class="daimei"><label for="password-confirm">パスワード(確認)</label></dt>
                    <dd><input type="password" name="password_confirmation" id="password" class="nyuuryoku" required></dd>
					<dt class="daimei"><label for="subject">科名</dt>
					<dd>
						{{Form::select('subject', [
							'1' => '自動車整備科',
							'2' => '電気システム科',
							'3' => 'メディアアート科',
							'4' => '情報システム科',
							'5' => 'オフィスビジネス科',
							'6' => '総合実務科'])}}
					</dd>
				</dl>

				<div class="touroku">
					<p class="button"><input type="submit" value="登録する" id="tourokusuru"></p>
        </div>

        {{-- 戻るボタン --}}
        <div class="modoru">
          <a href="{{ route('articles.index') }}" ><input type="submit" value="←もどる" id="modorubotan"></a>
			  </div>

				<div class="tyuukikakko">
					<a href="#">
						<img src="/image/tyuuki0.png" onmouseover="this.src='/image/tyuuki1.png'" onmouseout="this.src='/image/tyuuki0.png'" class="tyuuki" alt="注記">
					</a>
				</div>
            </form>
		</section>
	</main>

	@include('footer')
</body>
</html>
