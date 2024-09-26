<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/empdata.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
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
            <b class="emp-id">รหัสพนักงาน</b>
            <p>ชื่อ-นามสกุล</p>
            <p>เงินเดือน</p>
            <p>แผนก: ผู้จัดการร้าน</p>
            <button class="btn green">เพิ่มพนักงาน</button>
        </div>
        <br>
        <hr>
        <br>
        @foreach ($employees as $emp)
            <div class="emp">
                <b class="emp-id">{{ $emp->id }}</b>
                <p>ชื่อ-นามสกุล: {{ $emp->name }}</p>
                <p>เงินเดือน: {{ $emp->position->sarary }}</p>
                <p>แผนก: {{ $emp->position->name }}</p>
                <a href="{{ route('show_edit', $emp->id) }}" class="btn btn-primary">แก้ไขข้อมูล</a>
                <br>
                <!-- ฟอร์มสำหรับลบข้อมูล -->
                <form action="#" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"
                        onclick="return confirm('คุณแน่ใจว่าจะลบข้อมูลนี้หรือไม่?');">ลบข้อมูล</button>
                </form>
            </div>
            <br>
        @endforeach
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
