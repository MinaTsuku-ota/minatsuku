<!DOCTYPE html>
  <html lang="ja">
  <head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="/image/rogo.ico" type="image/vnd.microsoft.icon">
    <link rel="stylesheet" href="/css/style.css">
    <title>みなとぅく</title>
  </head>
  <body id="yarimasunee" onload="imgChange()" class="nightBG">
    <div id="indexTitle">
      <div class="title-01"><img src="/image/top.png" width="55%" alt="みなつくトップイメージ"></div>
      <div class="title-02"><img src="/image/syoudai.png" width="30%"></div>
    </div>
    <div id="indexButton">
      <div class="w-100 button-01"><a href={{ route('register') }} class="b1"><img src="/image/sinkitouroku.png" alt="新規登録する" width="15%"></a></div>
      <div class="w-100 button-01"><a href={{ route('articles.index') }} class="b1"><img src="/image/home.png" alt="ホームへ" width="15%"></a></div>
      <div class="w-100 button-01"><a href={{ route('login') }} class="b1"><img src="/image/rogin.png" alt="ログインする" width="15%"></a></div>
    </div>
    <script src="/js/jquery-3.4.1.min.js"></script>
    <script src="/js/myapp.js"></script>
  </body>
</html>
