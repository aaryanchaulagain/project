<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
   <a class="navbar-brand fw-bold text-danger fs-3 ms-5"href="/">ROOMCHAA</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Centered links -->
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item px-5">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item px-5">
          <a class="nav-link active" aria-current="page" href="/dog">Rooms</a>
        </li>
        <li class="nav-item px-5">
          <a class="nav-link active" aria-current="page" href="/about">AboutUs</a>
        </li>
      </ul>

      <!-- Right side button -->
      <ul class="navbar-nav ms-5">
        <li class="nav-item">
          <a href="{{ route('login') }}" class="btn btn-primary">Sign in</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
