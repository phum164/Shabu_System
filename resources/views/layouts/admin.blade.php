<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/addmenu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: rgb(235, 8, 8);">
    <div class="container">
      <a class="navbar-brand" href="#" style="font-weight: 600; letter-spacing: 1px;">IT BEEF SHABU</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home_admin') }}">Home</a>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#" style="word-spacing: 4px;"> <i class="bi bi-person-circle"></i>  Admin </a>
          </li>
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
  </nav><br>

    {{-- <div class="container text-center">
        <div class="row-2">
            <div class="col-3 border border-success-subtle">
                    <form action="/action_page.php">
                        <input type="text" placeholder="Search.." name="search">
                        <button type="submit"><i class="fa fa-search"></i></button>
                    </form>
            </div>
            <div class="col-3 border border-success-subtle">column</div>
            <div class="col-3 border border-success-subtle">
                Column
            </div>
        </div>
    </div> --}}
    <div class="container">
        <div class="row-2 m-3">
            <div class="col-3">
                <h3>@yield('headline')</h3>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            {{-- <div class="col-md-4">
                <form action="/action_page.php" method="get">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search.." name="search">
                        <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div> --}}
            <div class="col-4 mx-auto">
                <div class="input-group mb-4">
                    <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                    <input class="form-control" placeholder="Search" type="text">
                </div>
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-2" id="addmenu">
                {{-- <button type="button" class="btn bg-gradient-success w-auto me-1 mb-0">เพิ่มเมนูอาหาร</button> --}}
                {{-- <button type="button" class="btn btn-success"><b>เพิ่มเมนูอาหาร</b></button> --}}
                <a href="{{route('Addmenuadmin')}}" class="btn btn-success" role="button">เพิ่มเมนูอาหาร</a>
            </div>
        </div>
    </div>


    <!-- คัวเมนูหน้าแอดมิน -->
    <div class="container-fluid">
        <div class="row">
            @yield('content')
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
