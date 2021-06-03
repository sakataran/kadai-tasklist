<header>
    <nav class="navbar  navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand mb-0 h1" href="/">
        <i class="fas fa-tasks mr-2"></i>Tasklist</a>

        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                @if (Auth::check()) {{-- ログイン時 --}}
                    {{-- 新規タスクへのリンク --}}
                    <li class="nav-item">{!! link_to_route('tasks.create', 'Add', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログアウトへのリンク --}}
                    <li class="nav-item">{!! link_to_route('logout.get', 'Logout', [], ['class' => 'nav-link']) !!}</li>
                @else {{-- ゲスト時 --}}
                    {{-- ユーザ登録ページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                    {{-- ログインページへのリンク --}}
                    <li class="nav-item">{!! link_to_route('login', 'Login', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>