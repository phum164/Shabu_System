<!DOCTYPE html>
<html lang="en">
<head>
  <title>IT BEEF SHABU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/css/user.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: rgb(235, 8, 8);">
    <div class="container">
      <a class="navbar-brand" href="#" style="font-weight: 600; letter-spacing: 1px;">IT BEEF CHABU</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        @yield('active')
      </div>
    </div>
  </nav><br>

<div class="container search">
 @yield('search')
</div>
<!-- หมวดหมู่ -->
<div class="container">
   @yield('catagory')
</div>

<div class="container-fluid mt-4"><br>
  <div class="row ms-1" style="min-height: 100vh;">
    <!-- Sidebar -->
   @yield('sidebar')
   
    <!-- Main Content Area -->
    <div class="col-md-9">
      <div class="row g-3">
        <!-- การ์ดอาหาร -->
        @yield('oder')
        

      </div>
    </div>
  </div>

  @yield('content')



</div>
@stack('js')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>