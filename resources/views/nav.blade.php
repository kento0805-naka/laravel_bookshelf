<nav class="navbar navbar-expand navbar-dark default-color">

  <a class="navbar-brand" href="/"><i class="fas fa-book mr-1"></i>Bookshelf</a>

  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
    <a class="nav-link" href="{{ route('users.index') }}"><i class="far fa-user"></i>ユーザー検索</a>
    </li>
    @guest
    <li class="nav-item">
    <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
    </li>
    @endguest
    @guest
    <li class="nav-item">
    <a class="nav-link" href="{{ route('login') }}">ログイン</a>
    </li>
    @endguest
    
    @auth
    <li class="nav-item">
    <a class="nav-link" href="{{ route('book.create') }}"><i class="fas fa-book mr-1"></i>本を検索</a>
    </li>
    @endauth
    @auth
    <!-- Dropdown -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
         aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user-circle"></i>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button"
      onclick="location.href='{{ route('users.show', ['name' => Auth::user()->name]) }}'">
          マイページ
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
    </li>
<form id="logout-button" method="POST" action="{{ route('logout') }}">
        @csrf
    </form>
    <!-- Dropdown -->
    @endauth
  </ul>

</nav>