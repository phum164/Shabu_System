<!DOCTYPE html>
<html lang="en">

<head>
    <title>IT BEEF SHABU</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @stack('style')
</head>

<body>
<!-- เมนูฝั่งแอดมิน -->
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: rgb(235, 8, 8);">
  <div class="container-fluid ms-3">
    <a class="navbar-brand" href="{{ route('home_admin') }}" style="font-weight: 600; letter-spacing: 1px;">IT BEEF SHABU</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
       @yield('menu-active')
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
         
          <li class="nav-item">
            <!-- Form สำหรับการ logout -->
            <form method="POST" action="{{ route('logout') }}" x-data>
              @csrf
              <button class="nav-link" style="word-spacing: 4px;" @click.prevent="$root.submit();">
                <i class="bi bi-box-arrow-right"></i>  Logout
              </button>
            </form>
          </li>
        </ul>
      </div>
  </div>
</nav>

<!-- คัวเมนูหน้าแอดมิน -->
@yield('fixcon')
  <div class="row">
        @yield('menu')
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

</body>

</html>
