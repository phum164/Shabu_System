@extends('layouts.layout_admin')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/empdata.css') }}">
@endpush
@section('menu-active')
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home_admin') }}">หน้าหลัก</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('table_admin') }}">จัดการโต๊ะ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('menulist') }}">รายการอาหารของลูกค้า</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="/empdata">ข้อมูลพนักงาน</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('showstock') }}">แก้ไข เพิ่ม/ลบเมนู เช็คสต๊อค</a>
        </li>

    </ul>
@endsection

@section('menu')
    @if (session('success'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "แก้ไขพนักงานเสร็จสิ้น",
                showConfirmButton: false,
                timer: 1500
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                title: 'ข้อผิดพลาด!',
                text: "{{ $errors->first() }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    {{-- <header>
        <div class="header-title">
            <h1>IT BEEF chabu</h1>
        </div>
        <div class="search">
            <input type="text" placeholder="ค้นหา">
        </div>
    </header> --}}

    <section class="employee-section">
        <div class="empadd">
            <a class="btn btn-success" href="/register">เพิ่มพนักงาน</a>
        </div>
        <hr>
        @foreach ($employees as $emp)
            <div class="emp">
                <div class="text-primary form-group row align-items-center">
                    <label for="" class="col-sm-6 col-form-label text-right">รหัสพนักงาน:</label>
                    <div class="col-sm-6">
                        <label for="">{{ $emp->id }}</label>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="" class="col-sm-6 col-form-label text-right">ชื่อ-นามสกุล:</label>
                    <div class="col-sm-6">
                        <label for="">{{ $emp->name }}</label>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="" class="col-sm-6 col-form-label text-right">เงินเดือน:</label>
                    <div class="col-sm-6">
                        <label for="">{{ $emp->position->sarary }}</label>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="" class="col-sm-6 col-form-label text-right">เบอร์โทร:</label>
                    <div class="col-sm-6">
                        <label for="">{{ $emp->tell_number }}</label>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="" class="col-sm-6 col-form-label text-right">อีเมลล์:</label>
                    <div class="col-sm-6">
                        <label for="">{{ $emp->email }}</label>
                    </div>
                </div>
                <div class="form-group row align-items-center">
                    <label for="" class="col-sm-6 col-form-label text-right">แผนก:</label>
                    <div class="col-sm-6">
                        <label for="">{{ $emp->position->name }}</label>
                    </div>
                </div>
                <a href="{{ route('show_edit', $emp->id) }}" class="btn btn-warning">แก้ไขข้อมูล</a>

                <!-- ฟอร์มสำหรับลบข้อมูล -->
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger w-100"
                        onclick="return confirm('คุณแน่ใจว่าจะลบข้อมูลนี้หรือไม่?');">ลบข้อมูล</button>
                </form>
            </div>
        @endforeach
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
@endsection
