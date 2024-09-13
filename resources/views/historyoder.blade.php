<!DOCTYPE html>
<html lang="en">
<head>
  <title>IT BEEF CHABU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/css/user.css">
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
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('Orderfood_user')}}" >สั่งอาหาร</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">ประวัติการสั่งอาหาร</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">ยอดรวมทั้งหมด</a>
          </li>
        </ul>
      </div>
    </div>
  </nav><br>


<div class="container search">
  <h4>ประวัติการสั่งอาหาร</h4>
</div>
 
<div class="container-fluid mt-4"><br>
  <div class="row ms-1" style="min-height: 100vh;">
    <!-- Sidebar -->
    <div class="col-sm-12 col-md-3 sidebar order-md-last">
      <div class="timeout">
        <p>คุณเหลือเวลาอีก</p>
        <p>1 : 59 : 59</p>
      </div>
      <div class="listoder">
        <p><i class="bi bi-cart3"></i>  รายการอาหารของคุณ</p>
        <div class="oderlist">
          <img class="imglist" src="{{ asset('img/Pork/p1.png') }}"><br><br>
          <div class="gbtnoder sib">
            <p>หมูสามชั้น</p>
            <div class="ml-auto">
              <a class="del" href="#"> - </a>
              <label class="numoder"> 1 </label>
              <a class="add" href="#"> + </a>
            </div>
          </div>

        </div><br>
        <p>โต๊ะ 1</p>
        <a class="comf" href="#">สั่งอาหาร</a>
      </div>
    </div>

    <!-- Main Content Area -->
    <div class="col-sm-12 col-md-9">
      <div class="col-md-11 mt-3 ms-2">
        <div class="lishis">
        <label class="historyOder">สั่งไปเมื่อ 5 นาทีที่แล้ว</label><br><br>
         <table>
          <tr>
            <td><img class="hisimg" src="{{ asset('img/Pork/p1.png') }}"></td>
            <td class="mg">หมูสามชั้น</td>
            <td class="mg">จำนวน <br> 5</td>
            <td class="mg">กำลังดำเนินการ...</td>
          </tr>
         </table>
        </div>
      </div>

      </div>
    </div>

  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>