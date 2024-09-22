<!DOCTYPE html>
<html lang="en">
<head>
  <title>IT BEEF CHABU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/css/total.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: rgb(235, 8, 8);">
    <div class="container">
      <a class="navbar-brand" href="#">IT BEEF SHABU</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('Orderfood')}}">สั่งอาหาร</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('historyoder')}}">ประวัติการสั่งอาหาร</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('totalprice')}}">ยอดรวมทั้งหมด</a>
          </li>
        </ul>
      </div>
    </div>
  </nav><br>
  
  <div class="container-fluid">
    <div class="receipt">
      <h3 class="text-center">IT BEEF CHABU</h3>
      <p class="text-center">ใบเสร็จชำระเงิน</p>
      
      <div class="showdata">
        <p>โต๊ะ : {{ $bill->order->table->name }} | Bill ID : {{ $bill->id }}</p>
        <p>วันที่ : {{ $bill->created_at->format('d/m/Y') }} | เวลา : {{ $bill->created_at->format('H:i') }}</p>
        <p>ผู้ทำรายการ :{{ auth()->user()->name }}</p>
        <hr>
        <div class="detail">
          <p><b>รายการ</b></p>
          <p>ผู้ใหญ่</p><br><br>
          <p><b>จำนวน</b></p>
          <p>{{ $bill->person_amount }} ท่าน</p><br><br>
          <p><b>ราคา</b></p>
          <p>{{($bill->total_pay) }} บาท</p>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
