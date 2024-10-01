@extends('layouts.layout_admin')
@push('style')
    <link rel="stylesheet" href="{{ asset('css/empdata.css') }}">
@endpush
@section('content', 'employee')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('menu')
    @if (session('success'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: {{ session('success') }},
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
            @if ($emp->position_id != 1 && $emp->position_id != 2)
                <div class="emp">
                    <b class="text-primary">รหัสพนักงาน: {{ $emp->id }}</b>
                    <p>ชื่อ-นามสกุล: {{ $emp->name }}</p>
                    <p>เงินเดือน: {{ number_format($emp->position->salary, 0) }} บาท</p>
                    <p>เบอร์โทร: {{ $emp->tell_number }}</p>
                    <p>อีเมลล์: {{ $emp->email }}</p>
                    <p>แผนก: {{ $emp->position->name }}</p>
                    <a href="{{ route('show_edit', $emp->id) }}" class="btn btn-warning">แก้ไขข้อมูล</a>

                    {{-- <form action="/delete.emp/{{$emp->id}}" method="GET" id="deleteForm">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100" onclick="confirmDelete(e)">ลบข้อมูล</button>
                    </form> --}}
                    <form action="/delete.emp/{{ $emp->id }}" method="GET" id="deleteForm-{{ $emp->id }}">
                        @csrf
                        <button type="submit" class="btn btn-danger w-100" onclick="confirmDelete(event, {{ $emp->id }})">ลบข้อมูล</button>
                    </form>
                </div>
            @endif
        @endforeach
    </section>

    <script>
        function confirmDelete(e, formId) {
            e.preventDefault();
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
                    document.getElementById('deleteForm-' + formId).submit();
                }
            });
        }
    </script>
@endsection
