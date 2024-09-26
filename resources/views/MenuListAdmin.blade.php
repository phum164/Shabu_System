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

@push('style')
<link rel="stylesheet" href="{{ asset('css/menulist.css') }}">
@endpush
@section('menu')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menulist</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: rgb(228, 228, 228)">
    <div class="container mt-5">
        <div class="center">รายการอาหารของลูกค้า</div><br><br>

        <!-- วนลูปกลุ่มของออเดอร์ที่ถูกจัดกลุ่มตามเวลา -->
        @foreach ($listorders as $created_at => $orders)
            <form action="{{ route('update.status') }}" method="POST">
                @csrf
                <div class="block">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="table-header">
                                <!-- เข้าถึง bill ผ่านแต่ละ $order -->
                                <h4>โต๊ะ {{$orders->first()->bill->table_id}}</h4>
                            </div>
                        </div>

                        <div class="col-md-9">
                            @foreach ($orders as $order)
                            <div class="row table-section">
                                <div class="col-md-8">
                                    <h5>{{$order->menu->name}}</h5>
                                    <p>จำนวน {{$order->amount}} ถาด</p>
                                </div>

                                <!-- ถ้ามีมากกว่า 1 ออเดอร์ในเวลาเดียวกัน ให้แสดงเช็คบ็อกซ์ -->
                                @if($orders->count() > 1)
                                <div class="col-md-4 d-flex align-items-center justify-content-center checkbox-container">
                                    <input type="checkbox" name="order_ids[]" value="{{ $order->id }}">
                                </div>
                                @else
                                <input type="hidden" name="order_ids[]" value="{{ $order->id }}">
                                @endif
                            </div>

                            @if (!$loop->last)
                            <div class="col-md-12">
                                <hr class="menu-divider">
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <!-- ปุ่มยืนยัน -->
                    <div class="col-12 text-end mt-3">
                        <button type="submit" class="btn btn-success">ยืนยัน</button>
                    </div>
                </div>
            </form>
        @endforeach
    </div>

    <!-- ลิงก์ไปยัง Bootstrap JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
@endsection
<<<<<<< HEAD
=======
</html>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // เมื่อคลิกปุ่มยืนยัน
    document.querySelectorAll('.btn-success').forEach(function(button) {
        button.addEventListener('click', function(event) {
            // หาค่าของเช็คบ็อกซ์ทั้งหมดในกลุ่มนั้นๆ
            var group = this.closest('.block');
            var checkboxes = group.querySelectorAll('input[type="checkbox"]');
            var allChecked = true;

            checkboxes.forEach(function(checkbox) {
                if (!checkbox.checked) {
                    allChecked = false; // ถ้าเช็คบ็อกซ์ไหนยังไม่ถูกเลือก
                }
            });

            // ถ้าไม่ครบ ให้หยุดการส่งฟอร์ม
            if (!allChecked) {
                event.preventDefault();
                alert('กรุณาเลือกเมนูให้ครบทุกอันก่อนยืนยัน');
            }
        });
    });
});
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
>>>>>>> origin/Bom
