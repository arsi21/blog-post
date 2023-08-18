<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand" href="/">BlogPost</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse md-flex justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}"><i class="fa-solid fa-house"></i> Home</a>
        </li>
        @auth
        <li class="nav-item">
          <a class="nav-link" href="{{ route('posts.manage') }}"><i class="fa-solid fa-list-check"></i> Manage</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('posts.create')}}"><i class="fa-solid fa-plus"></i> Create</a>
        </li>
        <li class="d-flex align-items-center ms-lg-2">
          <div class="dropdown">
            <button class="btn btn-primary btn-sm dropdown-toggle text-capitalize" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{ auth()->user()->name }}
            </button>
            <ul class="dropdown-menu">
              <li>
                <form method="post" action="{{ route('users.logout') }}">
                  @csrf
                  <button class="dropdown-item" type="submit"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                </form>
              </li>
            </ul>
          </div>
        </li>
        @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.create') }}"><i class="fa-solid fa-user-plus"></i> Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
        </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>