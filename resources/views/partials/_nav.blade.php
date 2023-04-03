<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="/">My Site</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
          <li class="nav-item active">
              <a class="nav-link" href="/">Home</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#!">Privacy Policy</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#!">Contacts</a>
          </li>
      </ul>
      <ul class="navbar-nav">
          @if(Auth::check())
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Hello, {{ Auth::user()->name }}
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="/profile">Profile</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/skill">Skill</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="/logout">Logout</a>
              </div>
          </li>
          @else
          <li class="nav-item">
              <a class="nav-link" href="/login">Login</a>
          </li>
            <li class="nav-item">
                <a class="nav-link" href="/register">Register</a>
            </li>
          @endif
      </ul>
  </div>
</div>
</nav>