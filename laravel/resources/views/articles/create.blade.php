<!DOCTYPE html>
<html lang="ja">
	
	<head>
		<meta charset="UTF-8">
    <title>みなツク</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/post.css">
    <link rel="shortcut icon" href="/image/favicon.png" type="image/png">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/jquery-ui.min.js"></script>
    {{-- <script src="/js/D&D.js"></script> --}}
    <script src="/js/test_D&D.js"></script>

    @include('recaptcha_js')
</head>

<body>
    <div id="wrap">
        <header class="header clearfix">
            <div class="header-left clearfix">
                <a href="{{ route('articles.index')}}">
                    <img src="/image/home_daimei.png" class="home_daimei" alt="みなツク">
                </a>
            </div>
            <div class="header-right">
                <div class="btn login ">
                    <a href="{{ route('dashboard.index') }}">マイページ</a>
                </div>
                {{-- クリックされた時に下のlogout-formをsubmitするようにjavascriptで記述しています --}}
                <div class="btn sinki ">
                    <a href="#"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
            </div>
        </header>

        <main>
            <div class="header clearfix dummy">
                <div class="header-left clearfix">
                    <a href="#"><img src="/image/home_daimei.png" class="home_daimei" alt="みなツク"></a>
                </div>
                <div class="header-right">
                    <div class="btn login "><a href="#">ログイン</a></div>
                    <div class="btn sinki "><a href="#">新規登録</a></div>
                </div>
            </div>

            <div id="contens">
                <section class="homeContent clearfix">
                    <div class="toukouPanel">
                        <div id="post_syoudai">
                            <h1 class="post_daimei">新規投稿</h1>
                        </div>

                        <!-- 投稿フォーム -->
                        <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div id="ookisa">
                                <table class="toukou">
                                    <tr>
                                        <td>ジャンル?</td>
                                        <td style="border-style:none;">
                                            <select size="1" class="genre" name="genre_id" id="ref_gen">
                                                <option value="1">WEB</option>
                                                <option value="2">写真</option>
                                                <option value="3">動画</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" height="30px">
                                            <input type="text1" name="title" size="50" maxlength="20" placeholder="題名入力" id="ref_tit" required>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" height="300px" id="input_td">
                                            <span class="input_span">
                                                <div class="imageText">Click or Drop here</div>
                                                <input type="file" class="imageInput" id="Area0" name="file0">
                                            </span>
                                            <span class="input_span">
                                                <div class="imageText">Click or Drop here</div>
                                                <input type="file" class="imageInput" id="Area1" name="file1">
                                            </span>
                                            <span class="input_span">
                                                <div class="imageText">Click or Drop here</div>
                                                <input type="file" class="imageInput" id="Area2" name="file2">
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="10" height="350px">
                                            <textarea placeholder="作品の説明を記入してください。" class="setumeiText" name="body" id="ref_des"
                                                required></textarea>
                                        </td>
                                    </tr>
																</table>
																
																<!-- Preview area -->
																<div id="preview_wrap">
																	<h2>Simple preview feature.</h2>
																	<table class="preview_area">
																		<tr>
																			<td colspan="10" id="pre_gen">Genre</td>
																		</tr>
																		<tr>
																			<td colspan="10" id="pre_tit">Title</td>
																		</tr>
																		<tr>
																			<td colspan="6" height="220px" id="pre_des">Description</td>
																			<td colspan="4" height="220px" id="pre_img">
																				<output class="preImgPosition1"></output>
																				<output class="preImgPosition2"></output>
																				<output class="preImgPosition3"></output>
																			</td>
																		</tr>
																		<tr>
																			<td colspan="1"></td>
																			<td colspan="1"></td>
																			<td colspan="3" id="pre_name">Your name</td>
																			<td colspan="5" id="pre_dep">Your department</td>
																		</tr>
																	</table>
																</div>
																<!-- Preview area End -->

                                <div class="STbtn">
                                    <button type="submit" class="STbtnChild">投稿</button>
                                </div>
                                <input type="hidden" name="recaptcha" id="recaptcha">
                            </div>
                        </form>
                    </div>
                </section>
            </div>
				</main>
		<div class="goReflect"><a href="#" role="button" id="gR">プレビュー画面に反映するゾ</a></div>
    </div>
    @include('footer')
    </div>
    @if($errors->any())
    <script>
        alert("{{ $errors->first() }}")
				</script>
    @endif
				<script src="/js/instantPreview.js"></script>
</body>

</html>
