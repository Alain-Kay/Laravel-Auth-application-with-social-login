<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand" href="{{ route('index') }}">Auth</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="{{ route('index') }}">Home</a>
          </li>
          {{-- check login  for nav --}}
          @if (Illuminate\Support\Facades\Auth::check())
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('question') }}">question</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('logout') }}">Logout - {{ Illuminate\Support\Facades\Auth::user()->uname }}</a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('registerShow') }}">Register</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('loginShow') }}">Login</a>
          </li>
          @endif
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>