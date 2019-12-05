<header class="header clearfix">
    <div class="header-left clearfix">
        <a href="{{ route('articles.index') }}"><img src="/image/home_daimei.png" class="home_daimei" alt="みなツク"></a>
    </div>
    {{--ログインしていない時のメニュー --}}
    @guest
    <div class="header-right">
        <div class="btn login "><a href="{{ route('login') }}">ログイン</a></div>
        <div class="btn sinki "><a href="{{ route('register') }}">新規登録</a></div>
    </div>
    {{-- ログインしている時のメニュー --}}
    @else
    <div class="header-right">

        <!-- 仮の投稿ボタン -->
        <div class="btn sinki "><a href="{{ route('articles.create') }}">投稿</a></div>

        {{-- クリックされた時に下のlogout-formをsubmitするようにjavascriptで記述しています --}}
        <div class="btn login "><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a></div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
        <div class="btn sinki "><a href="{{ route('dashboard') }}">DashBoard</a></div>
    </div>
    @endguest
</header>
