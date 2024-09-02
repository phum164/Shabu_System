<!DOCTYPE html>
<html lang="en">
<head>
  <title>IT BEEF CHABU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600&display=swap');
    body{
        background-color: rgb(228, 228, 228);
        font-family: 'kanit', sans-serif;
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    .content{
        background-color: white;
        padding: 1em;
        text-align: center;
        border-radius: 25px;
        margin-bottom: 1rem; 
    }
    img{
        width: 100%;
    }
    .btn{
        color: black;
        border: 2px solid rgb(189, 189, 189);
        margin-top: 1em;
        width: 100%;
        padding: 1em;
        font-weight: 500;
        border-radius: 23px;
    }

    .btn:hover {
    background-color: rgb(233, 233, 233); 
    color: rgb(0, 0, 0); 
    border-color: rgb(150, 150, 150); 
    }
   
  </style>
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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
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
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="content">
            <img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU">  
            <a class="btn" href="#">จัดการโต๊ะ</a> 
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="content">
            <img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU">
                <a class="btn" href="#">รายการอาหารของลูกค้า</a> 
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="content">
            <img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU">
            <a class="btn" href="#">ข้อมูลพนักงาน</a> 
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="content">
            <img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU">
                <a class="btn" href="#">แก้ไข เพิ่ม/ลบเมนู เช็คสต๊อค</a> 
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
