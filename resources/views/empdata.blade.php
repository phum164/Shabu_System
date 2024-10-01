@extends('layouts.layout_admin')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/empdata.css') }}">
@endpush
@section('content','employee')
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
        {{-- <div class="empadd">
            <a class="btn btn-success" href="/">เงินเดือน</a>
        </div> --}}
        <hr>
        @foreach ($employees as $emp)
            <div class="emp">
                <b class="text-primary">รหัสพนักงาน: {{ $emp->id }}</b>
                <p>ชื่อ-นามสกุล: {{ $emp->name }}</p>
                <p>เงินเดือน: {{ number_format($emp->position->salary,0) }} บาท</p>
                <p>เบอร์โทร: {{ $emp->tell_number }}</p>
                <p>อีเมลล์: {{ $emp->email }}</p>
                <p>แผนก: {{ $emp->position->name }}</p>
                <a href="{{ route('show_edit', $emp->id) }}" class="btn btn-warning">แก้ไขข้อมูล</a>

                <!-- ฟอร์มสำหรับลบข้อมูล -->
                <form action="/delete" method="GET">
                    @csrf
                    <button type="submit" class="btn btn-danger w-100" onclick="confirmDelete()">ลบข้อมูล</button>
                </form>
            </div>
        @endforeach
    </section>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function confirmDelete() {
            Swal.fire({
                title: 'คุณแน่ใจหรือไม่?',
                text: "คุณกำลังจะลบข้อมูลพนักงาน การกระทำนี้ไม่สามารถย้อนกลับได้!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'ใช่, ลบเลย!',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('deleteForm').submit();
                }
            });
        }
    </script>
@endsection
