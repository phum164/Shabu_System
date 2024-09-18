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
        <div class="emp">
            <b class="emp-id">รหัสพนักงาน EM001</b>
            <p>ชื่อ-นามสกุล: ภูมรพี วงศ์สิริ</p>
            <p>เงินเดือน: 35,000</p>
            <p>แผนก: ผู้จัดการร้าน</p>
            <button class="btn red">แก้ไขข้อมูล</button>
        </div>
        <br>
        <div class="emp">
            <b class="emp-id">รหัสพนักงาน EM002</b>
            <p>ชื่อ-นามสกุล: สวัสดิ์ วันจันทร์</p>
            <p>เงินเดือน: 20,000</p>
            <p>แผนก: ผู้จัดการครัว</p>
            <button class="btn red">แก้ไขข้อมูล</button>
        </div>
        <br>
        <div class="emp">
            <b class="emp-id">รหัสพนักงาน EM003</b>
            <p>ชื่อ-นามสกุล: ธารา ตรีมิต</p>
            <p>เงินเดือน: 15,000</p>
            <p>แผนก: พนักงานต้อนรับ</p>
            <button class="btn red">แก้ไขข้อมูล</button>
        </div>
    </section>
</body>

</html>