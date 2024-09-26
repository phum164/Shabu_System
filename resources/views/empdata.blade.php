<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>

<body>
    <link rel="stylesheet" href="{{ asset('css/empdata.css') }}">
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

    <header>
        <div class="header-title">
            <h1>IT BEEF chabu</h1>
        </div>
        <div class="search">
            <input type="text" placeholder="ค้นหา">
        </div>
    </header>

    <section class="employee-section">
        <div class="empadd">
            <a class="btn btn-success" href="/register">เพิ่มพนักงาน</a>
        </div>
        <hr>
        @foreach ($employees as $emp)
            <div class="emp">
                <b class="text-primary">รหัสพนักงาน: {{ $emp->id }}</b>
                <p>ชื่อ-นามสกุล: {{ $emp->name }}</p>
                <p>เงินเดือน: {{ $emp->position->sarary }}</p>
                <p>เบอร์โทร: {{ $emp->tell_number }}</p>
                <p>อีเมลล์: {{ $emp->email }}</p>
                <p>แผนก: {{ $emp->position->name }}</p>
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
</body>
</html>
