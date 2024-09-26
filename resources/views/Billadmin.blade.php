<!DOCTYPE html>
<html lang="en">
<head>
  <title>IT BEEF SHABU</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/css/total.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark " style="background-color: rgb(235, 8, 8);">
    <div class="container-fluid ms-3">
      <a class="navbar-brand" href="#" style="font-weight: 600; letter-spacing: 1px;">IT BEEF SHABU</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link " href="{{ route('home_admin') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('table_admin' )}}">จัดการโต๊ะ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('menulist' )}}">รายการอาหารของลูกค้า</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">ข้อมูลพนักงาน</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('showstock')}}">แก้ไข เพิ่ม/ลบเมนู เช็คสต๊อค</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('showstock')}}">ใบเสร็จชำระเงิน</a>
          </li>
        </ul>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
       
      </div>
    </div>
  </nav><br>
  
  <div class="container-fluid">
    <div class="receipt">
      <h3 class="text-center mb-3">IT BEEF SHABU</h3>
      @foreach($bills as $bill)
      <p class="text-center">ใบเสร็จชำระเงิน |   
        @if ($bill->status == 0)
          <b style="color: rgb(255, 0, 0)"> ยังไม่ชำระเงิน</b>
        @elseif($order->status == 1)
          <b style="color: rgb(0, 211, 18)">ขำระเงินเรียบร้อย</b>
        @endif</p>

      <div class="showdata">
        <p>โต๊ะ : {{ $bill->table->id ?? 'N/A' }} | Bill ID : {{ $bill->id }}</p>
        <p>วันที่ : {{ \Carbon\Carbon::parse($bill->start_time)->format('d/m/Y') }} | เวลา : {{ \Carbon\Carbon::parse($bill->start_time)->format('H:i') }}</p>
        <p>ผู้ทำรายการ : {{ auth()->user()->name }}</p>
        <hr>
        <div class="detail">
          <div class="row text-center">
            <div class="col-4">
              <p><b>รายการ</b></p>
              <p>ผู้ใหญ่</p><br>
            </div>
            <div class="col-4">
              <p><b>จำนวน</b></p>
              <p>{{ $bill->person_amount }} ท่าน</p><br>
            </div>
            <div class="col-4">
              <p><b>ราคา</b></p>
              <p>{{($bill->total_pay) }} บาท</p>
            </div>
        </div>
        @endforeach
        <hr>

        <div class="container mt-4">
          <form class="p-3 bg-light rounded">
              <div class="mb-3">
                  <label for="adjustment" class="form-label">ค่าปรับ</label>
                  <input type="text" class="form-control" id="adjustment" placeholder="กรอกค่าปรับ">
              </div>
      
              <div class="mb-3">
                  <label for="amountDue" class="form-label">ที่ต้องชำระ</label>
                  <input type="text" class="form-control" id="amountDue" placeholder="กรอกจำนวนที่ต้องชำระ">
              </div>
      
              <div class="mb-3">
                  <label for="amountReceived" class="form-label">รับชำระ</label>
                  <input type="text" class="form-control" id="amountReceived" placeholder="กรอกจำนวนที่รับชำระ">
              </div>
      
              <div class="mb-3">
                  <label for="totalAmount" class="form-label">ยอดรวมทั้งหมด:</label>
                  <p>แสดงยอดรวมทั้งหมด</p>
              </div>
              <button type="submit" class="btn btn-danger w-100 mb-5 mt-2">ขำระเงิน</button>

      
              <div class="text-center">
                  <img src="{{ asset('img/qrcodecash.png') }}" alt="QR Code" class="img-fluid" style="max-width: 300px;">
              </div>

              <div class="text-center mt-5">
                  <p class="text-muted">IT BEEF SHABU</p>
              </div>
          </form>
      </div>

      </div>
    </div>
  </div>
  </div>
</body>
</html>


