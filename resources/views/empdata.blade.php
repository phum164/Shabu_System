@extends('layouts.layout_admin')
@push('style')
<link rel="stylesheet" href="{{ asset('css/empdata.css') }}">
@endpush

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


    <section class="employee-section">
        <div class="empadd">
            <a class="btn btn-success" href="/register">เพิ่มพนักงาน</a>
        </div>
        <hr>
        @foreach ($employees as $emp)
            <div class="emp">
                <b class="text-primary">รหัสพนักงาน: {{ $emp->id }}</b>
                <p>ชื่อ-นามสกุล: {{ $emp->name }}</p>
                <p>เงินเดือน: {{ number_format($emp->position->sarary,0) }} บาท</p>
                <p>เบอร์โทร: {{ $emp->tell_number }}</p>
                <p>อีเมลล์: {{ $emp->email }}</p>
                <p>แผนก: {{ $emp->position->name }}</p>
                <a href="{{ route('show_edit', $emp->id) }}" class="btn btn-warning">แก้ไขข้อมูล</a>

                <!-- ฟอร์มสำหรับลบข้อมูล -->
                <form action="/delete" method="GET">
                    @csrf
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