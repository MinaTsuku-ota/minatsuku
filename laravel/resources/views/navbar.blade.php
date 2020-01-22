<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <!-- ブランド表示 -->
    <a class="navbar-brand" href="{{ route('articles.index') }}">My Blog</a>

    <!-- スマホやタブレットで表示した時のメニューボタン -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- メニュー -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- 左寄せメニュー -->
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('articles.index') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('about') }}">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('contact') }}">Contact</a>
        </li>
      </ul>

      <!-- 右寄せメニュー -->
      <ul class="navbar-nav">
        {{-- @guest を使って、ゲスト（ログインしていない）の時とログインしている時でメニューの表示を分けています --}}
        @guest
          <!-- ログインしていない時のメニュー -->
          <li class="nav-item">
            {{-- リンク先にログインページヘのルートを指定 --}}
            <a class="nav-link" href="{{ route('login') }}">Login</a>
          </li>
          <li class="nav-item">
            {{--  リンク先にユーザー登録ページヘのルートを指定 --}}
            <a class="nav-link" href="{{ route('register') }}">Register</a>
          </li>
        @else
          <!-- ログインしている時のメニュー -->
          <li class="nav-item">
            {{-- リンク先にダッシュボードヘのルートを指定 --}}
            <a class="nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
          </li>

          <!-- ドロップダウンメニュー -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              {{-- ログインユーザーの名前を表示 --}}
              {{ Auth::user()->name }}<span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              {{-- クリックされた時に下のlogout-formをsubmitするようにjavascriptで記述しています --}}
              <a class="dropdown-item" href="#"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                Logout
              </a>
              {{-- logoutルートへPOSTリクエストを送るフォームです。Logoutがクリックされた時に送信され、ログアウト処理が実行されます --}}
              {{-- ここでは Formヘルパーを使わず、<form> タグを直接記述しているため、CSRF対策のトークンを自分で埋め込む必要があります --}}
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </li>
        @endguest

      </ul>
    </div>
  </div>
</nav>
