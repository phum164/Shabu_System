<!DOCTYPE html>
<html lang="en">
<head>
  <title>IT BEEF CHABU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/css/total.css">
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
            <a class="nav-link" href="{{ route('Orderfood')}}" >สั่งอาหาร</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('historyoder')}}">ประวัติการสั่งอาหาร</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active"  href="{{ route('totalprice')}}">ยอดรวมทั้งหมด</a>
          </li>
        </ul>
      </div>
    </div>
  </nav><br>
  
  <div class="container-fluid">
    <div class="receipt">
      <h3 class="text-center">IT BEEF CHABU</h3>
      <p class="text-center">ใบเสร็จชำระเงิน</p>
      <p class="text-center">แสดงเวลาที่เหลือ</p>
      
      <div class="showdata">
        <p>โต๊ะ : 03 | Order_ID : 021</p>
        <p>วันที่ : | เวลา :</p>
        <p>ผู้ทำรายการ :</p>
        <hr>
        <div class="detail">
          <p><b>รายการ</b></p>
          <p>ผู้ใหญ่</p><br><br>
          <p><b>จำนวน</b></p>
          <p>3 ท่าน</p><br><br>
          <p><b>ราคา</b></p>
          <p>897.00 บาท</p>
        </div>
      </div>
    </div>
  </div>