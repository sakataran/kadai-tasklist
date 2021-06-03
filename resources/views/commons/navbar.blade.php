<header>
    <nav class="navbar  navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand mb-0 h1" href="/">
        <i class="fas fa-tasks mr-2"></i>Tasklist</a>
            
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav">
                {{-- ゲスト時 --}}
                {{-- ユーザ登録ページへのリンク --}}
                <li>{!! link_to_route('signup.get', 'Signup', [], ['class' => 'nav-link']) !!}</li>
                {{-- ログインページへのリンク --}}
                <li><a href="#">Login</a></li>
                
                {{-- ログイン時 --}}
                <li class="nav-item">{!! link_to_route('tasks.create', 'Add', [], ['class' => 'nav-link']) !!}</li>
            </ul>
        </div>
    </nav>
</header>