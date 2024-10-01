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
            <a class="navbar-brand" href="{{ route('home_admin') }}" style="font-weight: 600; letter-spacing: 1px;">IT
                BEEF SHABU</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav mx-auto text-center">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home_admin') ? 'active' : '' }}"
                            href="{{ route('home_admin') }}">หน้าหลัก</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('table_admin') ? 'active' : '' }}"
                            href="{{ route('table_admin') }}">จัดการโต๊ะ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('menulist') ? 'active' : '' }}"
                            href="{{ route('menulist') }}">รายการอาหารของลูกค้า</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('empdata') ? 'active' : '' }}"
                            href="/empdata">ข้อมูลพนักงาน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('showstock') ? 'active' : '' }}"
                            href="{{ route('showstock') }}">แก้ไข เพิ่ม/ลบเมนู เช็คสต๊อค</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('all_bill.showBill') ? 'active' : '' }}"
                            href="{{ route('all_bill.showBill') }}">บิลทั้งหมด</a>
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

            @php
                $latestBill = $bill;
            @endphp

            @if ($latestBill)
                <p class="text-center">ใบเสร็จชำระเงิน |
                    @if ($latestBill->status == 0)
                        <b style="color: rgb(255, 0, 0)"> ยังไม่ชำระเงิน</b>
                    @elseif($latestBill->status == 1)
                        <b style="color: rgb(0, 211, 18)">ชำระเงินเรียบร้อย</b>
                    @endif
                </p>

                <div class="showdata">
                    <p>โต๊ะ : {{ $latestBill->table->id ?? 'N/A' }} | Bill ID : {{ $latestBill->id }}</p>
                    <p>วันที่ : {{ \Carbon\Carbon::parse($latestBill->start_time)->format('d/m/Y') }} | เวลา :
                        {{ \Carbon\Carbon::parse($latestBill->start_time)->format('H:i') }}</p>
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
                                <p>{{ $latestBill->person_amount }} ท่าน</p><br>
                            </div>
                            <div class="col-4">
                                <p><b>ราคา</b></p>
                                <p>{{ number_format($latestBill->total_pay, 0) }} บาท</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            @else
                <p>ไม่มีใบเสร็จที่ต้องแสดง</p>
            @endif
            <hr>

            <div class="container mt-4 p-3 bg-light rounded">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('update-total-pay') }}" method="POST">
                    @csrf
                    <input type="hidden" name="bill_id" value="{{ $latestBill->id }}">

                    <div class="mb-3">
                        <label for="adjustment" class="form-label">ค่าปรับ</label>
                        <input type="number" class="form-control" name="adjustment" id="adjustment"
                            placeholder="กรอกค่าปรับ">
                    </div>

                    <div class="mb-3">
                        <label for="amountprice" class="form-label">ที่ต้องชำระ</label>
                        <input type="number" class="form-control" name="amountprice" placeholder="กรอกจำนวนที่ต้องชำระ"
                            value="{{ $latestBill->total_pay }}">
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mb-4 mt-2">คำนวนราคา</button>
                    <div class="mb-4">
                        <label for="totalAmount" class="form-label">ยอดรวมทั้งหมด</label>
                        <p> {{ number_format($latestBill->total_pay, 0) }} บาท</p>
                    </div>
                </form>
                <form action="{{ route('checkbill', ['id' => $latestBill->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100 mb-5 mt-2">ชำระเงิน</button>
                </form>


                <div class="text-center">
                    <img src="{{ asset('img/qrcodecash.png') }}" alt="QR Code" class="img-fluid"
                        style="max-width: 300px;">
                </div>

                <div class="text-center mt-5">
                    <p class="text-muted">IT BEEF SHABU</p>
                </div>

            </div>

        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
