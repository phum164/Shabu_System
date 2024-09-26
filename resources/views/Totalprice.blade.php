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
      <h3 class="text-center mb-3">IT BEEF SHABU</h3>
      @foreach($bills as $bill)
      <p class="text-center">ใบเสร็จชำระเงิน</p>

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
              <div class="mb-3">
                  <label class="form-label">ยอดรวมทั้งหมด :   {{($bill->total_pay) }} บาท</p></label>
                
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


