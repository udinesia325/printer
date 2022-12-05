<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Printer Kabasa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awe      some.min.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/1d385cb44e.js" crossorigin="anonymou      s"></script>
  <link rel="shortcut icon" href="/logo.jpg" type="image/x-icon" />
  @stack("style")
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <div class="container">
      <a class="navbar-brand" href="/">Halo {{ Auth::user()->username}}</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link {{ Route::is("home")?"active":""}} " aria-current="page" href="/">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Route::is("rekapan")?"active":""}} " aria-current="page" href="/rekapan">Rekapan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/logout">Logout</a>
          </li>
          @can("admin_only")
          <li class="nav-item">
            <a class="nav-link {{ Route::is("register")?"active":""}} " aria-current="page" href="/register">Register</a>
          </li>
          @endcan
        </ul>
      </div>
  </nav>
  <div class="container mt-5" style="min-height:100vh;">
    @yield("content")
  </div>
  <div class="container-fluid bg-dark pt-3 pb-5" style="min-height: 100px;">
    <p class="text-center text-light">&copy; Udinesia325 {{ date("Y")}} All Rights Reserved</p>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  @stack("script")
</body>

</html>
