<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="{{ url('/') }}">BlogApp</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        @auth
          {{-- <li class="nav-item"><a href="{{ route('posts.index') }}" class="nav-link">Dashboard</a></li>
          <li class="nav-item"><a href="{{ route('posts.create') }}" class="nav-link">Create Post</a></li> --}}
          <li class="nav-item">
            <form action="{{ route('logout') }}" method="POST">@csrf
              <button class="btn btn-sm btn-outline-light ms-2">Logout</button>
            </form>
          </li>
        @else
          {{-- <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
          <li class="nav-item"><a href="{{ route('register') }}" class="nav-link">Register</a></li> --}}
        @endauth
      </ul>
    </div>
  </div>
</nav>
