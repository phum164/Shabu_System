<!DOCTYPE html>
<html lang="en">
<head>
  <title>IT BEEF CHABU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/css/admin.css">
</head>
<body>
<!-- เมนูฝั่งแอดมิน -->

<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: rgb(235, 8, 8);">
    <div class="container">
      <a class="navbar-brand" href="#" style="font-weight: 600; letter-spacing: 1px;">IT BEEF CHABU</a>
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
            <a class="nav-link" href="#"style="word-spacing: 4px;"><i class="bi bi-box-arrow-right"></i>  Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav><br>

<!-- คัวเมนูหน้าแอดมิน -->
<div class="container">
    <br><h2>การจัดการโต๊ะภายในร้าน</h2><br>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="table">
            <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
        <p>โต๊ะ 1</p>
        <hr>
        <p class="status c">Close</p>
        <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> 2    ฿ 299</p>
        </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="table">
              <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
        <p>โต๊ะ 2</p>
        <hr>
        <p class="status o">Open</p>
        <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> -    ฿ 0</p>
        </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="table">
              <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
        <p>โต๊ะ 3</p>
        <hr>
        <p class="status o">Open</p>
        <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> -    ฿ 0</p>
        </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="table">
              <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
        <p>โต๊ะ 4</p>
        <hr>
        <p class="status o">Open</p>
        <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> -    ฿ 0</p>
        </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="table">
              <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
        <p>โต๊ะ 5</p>
        <hr>
        <p class="status o">Open</p>
        <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> -    ฿ 0</p>
        </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="table">
              <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
        <p>โต๊ะ 6</p>
        <hr>
        <p class="status o">Open</p>
        <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> -    ฿ 0</p>
        </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="table">
              <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
        <p>โต๊ะ 7</p>
        <hr>
        <p class="status o">Open</p>
        <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> -    ฿ 0</p>
        </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-3">
            <div class="table">
              <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
        <p>โต๊ะ 8</p>
        <hr>
        <p class="status o">Open</p>
        <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> -    ฿ 0</p>
        </div>
        </div>
        

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
