@extends('layouts.layout_admin')
@section('menu-active')
<ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link " href="{{ route('home_admin') }}">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('table_admin' )}}">จัดการโต๊ะ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('menulist' )}}">รายการอาหารของลูกค้า</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/empdata">ข้อมูลพนักงาน</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('showstock')}}">แก้ไข เพิ่ม/ลบเมนู เช็คสต๊อค</a>
    </li>
    <li class="nav-item">
        <a class="nav-link " href="{{ route('Billadmin')}}">ใบเสร็จชำระเงิน</a>
      </li>
  </ul>
@endsection

@section('menu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menulistofcustomer</title>

     <link rel="stylesheet" href="admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>.center{
    text-align:center;
    align-items: center;
    font-size: 25px;
    font-weight: bold;
}

.table-header {
    font-weight: bold;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}

.menu-divider {
    width: calc(100% - 20px); 
    margin-left: auto;
}

.table-section {
    display: flex;
    align-items: center;
    margin-bottom: 30px; 
}

.block {
    max-width: 800px; 
    margin: 0 auto;
    padding: 10px 15px; 
    background-color: #fff;
    border-radius: 20px;
    box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

/* ลดขนาดปุ่ม */
.btn-success {
    padding: 5px 10px;
    font-size: 0.9rem;
}

h4{
    font-weight: bold;
}
h5, p {
    font-weight: bold;
    margin: 5px 0;
}

h5 {
    font-weight: bold;
    font-size: 1rem;
}

p {
    font-weight: bold;
    font-size: 0.85rem;
}


.checkbox-container input[type="checkbox"] {
    width: 25px;
    height: 25px; 
    transform: scale(1.5);
}
</style> 
</head>
<body style="background-color: rgb(228, 228, 228)">
    <div class="container mt-5">
        <div class="center">รายการอาหารของลูกค้า</div><br><br>

        <div class="block">
            <div class="row table-section">
                <div class="col-md-3 border-end">
                    <div class="table-header">
                        <h4>โต๊ะ 1</h4>
                    </div>
                </div>
                <!-- คอลัมน์สำหรับเมนูและเช็คบ็อกซ์ -->
                <div class="col-md-7">
                    <h5>หมูสามชั้น</h5>
                    <p>จำนวน 5 ถาด</p>
                    <p class="text-danger">หมายเหตุ: ขอหมูที่เกิดในวันพระจันทร์เต็มดวง</p>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-center checkbox-container">
                    <input type="checkbox">
                </div>
                <div class="col-12 text-end mt-3">
                    <button class="btn btn-success">ยืนยัน</button>
                </div>
            </div>
        </div>

        <div class="block">
            <div class="row table-section">
                <div class="col-md-3 border-end d-flex align-items-center justify-content-center">
                    <div class="table-header">
                        <h4>โต๊ะ 4</h4>
                    </div>
                </div>

                <div class="col-md-7">
                    <h5>หมูสามชั้น</h5>
                    <p>จำนวน 5 ถาด</p>
                    <p class="text-danger">หมายเหตุ: ขอหมูดำ</p>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-center checkbox-container">
                    <input type="checkbox">
                </div>

                <div class="col-md-7 offset-md-3">
                    <hr class="menu-divider"> <!-- เส้นแบ่งระหว่างเมนู -->
                </div>

                <!-- คอลัมน์สำหรับเมนูที่ 2 และเช็คบ็อกซ์ -->
                <div class="col-md-7 offset-md-3">
                    <h5>กุ้ง</h5>
                    <p>จำนวน 10 ถาด</p>
                    <p class="text-danger">หมายเหตุ: -</p>
                </div>
                <div class="col-md-2 d-flex align-items-center justify-content-center checkbox-container">
                    <input type="checkbox">
                </div>
                <div class="col-12 text-end mt-3">
                    <button class="btn btn-success">ยืนยัน</button>
                </div>
            </div>
        </div>

    </div>

    <!-- ลิงก์ไปยัง Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
