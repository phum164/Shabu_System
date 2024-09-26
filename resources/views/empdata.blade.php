<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/empdata.css') }}">
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
                <b class="emp-id">{{$emp->id}}</b>
                <p>ชื่อ-นามสกุล: {{$emp->name}}</p>
                <p>เงินเดือน: {{$emp->position->sarary}}</p>
                <p>แผนก: {{$emp->position->name}}</p>
                <a href="{{ route('edit'$emp->id) }}"  class="btn btn-primary">แก้ไขข้อมูล</a>
                <br>
                <!-- ฟอร์มสำหรับลบข้อมูล -->
                <form action="{{ route('Employee.destroy', $emp->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('คุณแน่ใจว่าจะลบข้อมูลนี้หรือไม่?');">ลบข้อมูล</button>
                </form>            
            </div>
            <br>
        @endforeach
    </section>
</body>

</html>