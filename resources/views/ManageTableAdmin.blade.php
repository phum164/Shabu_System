@extends('layout_admin')
@push ('style')
        <link rel="stylesheet" href="{{ asset('css/managetableadmin.css') }}">
@endpush
@section('menu-active')
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('home_admin') }}">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('table_admin' )}}">จัดการโต๊ะ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('menulist' )}}">รายการอาหารของลูกค้า</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('empdata')}}">ข้อมูลพนักงาน</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('stock')}}">แก้ไข เพิ่ม/ลบเมนู เช็คสต๊อค</a>
      </li>
    </ul>
@endsection

    
@section('menu')
<!-- อย่าพึ่งทำอะไร ทำให้มันไม่ error ตอน push เฉยๆเดะมาทำต่อจ้า แต่ถ้าใครอยากทำให้ก็ได้นะจุบุ -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManageTable</title>
    <link rel="stylesheet" href="managetableadmin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body style="background-color:rgb(228, 228, 228)">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 bg-white p-3">
            <div class="table-list">
                @for ($i = 1; $i <= 8; $i++)
                <div class="table-status mb-3 selectable-table" id="table-{{ $i }}" onclick="selectTable({{ $i }})">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="table-info">โต๊ะ: {{ $i }}</div>
                        <p>เวลาที่เหลือ</p>
                    </div>
                    <div>
                    <div class="people-info"><i class="bi bi-person-fill"></i>{{ $peopleCount[$i] }}</div>
                    <div class="time-remaining text-black">{{ $timeRemaining[$i] }}</div>
                     <a href="#" class="add-button">+</a></div>
                </div>
                @endfor
            </div>
        </div>

        <!-- Right Column (Order Details) -->
        <div class="col-md-8">
            <div id="order-details">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-start">
                            <div class="mb-2"><strong>โต๊ะ:</strong> <span id="table-number">1</span></div>
                            <div class="mb-2"><strong>จำนวนคน:</strong> <span id="people-number">2</span></div>
                            <div class="mb-2"><strong>เวลา:</strong> <span id="time-remaining-right">1:59:59</span></div>
                            <div class="mb-2"><strong>พนักงาน:</strong> EM003</div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button class="btn btn-dark text-white mr-2">แก้ไข</button>
                            <button class="btn btn-danger text-white">เช็คบิล</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    const peopleCount = {1: 2, 2: 4, 3: 3, 4: 5, 5: 4, 6: 6, 7: 2, 8: 8};
    const timeRemaining = {1: "1:59:59", 2: "0:00:00", 3: "0:45:30", 4: "0:00:00", 5: "1:15:10", 6: "0:00:00", 7: "1:30:50", 8: "0:00:00"};

    function selectTable(tableNumber) {
        document.querySelectorAll('.selectable-table').forEach(table => table.classList.remove('active'));
        document.getElementById('table-' + tableNumber).classList.add('active');
        document.getElementById('table-number').innerText = tableNumber;
        document.getElementById('people-number').innerText = peopleCount[tableNumber];
        document.getElementById('time-remaining-right').innerText = timeRemaining[tableNumber];
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@endsection

</body>
</html>