<header class="header clearfix">
    <div class="header-left clearfix">
        <a href="{{ route('articles.index') }}">
            <img src="/image/home_daimei.png" class="home_daimei" alt="みなツク">
        </a>
    </div>

    <div class="header-right">
        {{--ログインしていない時のメニュー --}}
        @guest
        <a href="{{ route('login') }}">
            <div class="btn login ">ログイン</div>
        </a>
        <a href="{{ route('register') }}">
            <div class="btn sinki ">新規登録</div>
        </a>
        {{-- ログインしている時のメニュー --}}
        @else
        <a href="{{ route('dashboard.index') }}">
            <div class="btn mypage ">マイページ</div>
        </a>
        {{-- クリックされた時に下のlogout-formをsubmitするようにjavascriptで記述しています --}}
        <div class="btn sinki ">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endguest
    </div>
</header>
<main>
    @include('header_dummy')
