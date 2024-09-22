<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติการจัดการแก้ไข</title>
    <link rel="stylesheet" href="{{ asset('css/edithistory.css') }}">
</head>

<body>
    <header>
        <div class="header-title">
            <h1>IT BEEF chabu</h1>
        </div>
    </header>
    <br>
    <section class="content-section">
        <h2>ประวัติจัดการแก้ไข</h2>

        <div class="search-bar">
            <input type="text" placeholder="ค้นหาเมนูที่ต้องการ">
        </div>

        <div class="category-buttons">
            <button class="btn">ทั้งหมด</button>
            <button class="btn">เนื้อสัตว์</button>
            <button class="btn">ผัก</button>
            <button class="btn">รายการอาหารอื่นๆ</button>
            <button class="btn">ของทานเล่น</button>
            <button class="btn">บริการอื่นๆ</button>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ชื่อ</th>
                    <th>หมวดหมู่</th>
                    <th>วันที่แก้ไข</th>
                    <th>สต๊อก</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>หมูสามชั้นสไลด์</td>
                    <td>เนื้อสัตว์</td>
                    <td>13/8/2024 15:09:24</td>
                    <td>999</td>
                </tr>
                <tr>
                    <td>ตันหมู</td>
                    <td>เนื้อสัตว์</td>
                    <td>13/8/2024 15:07:30</td>
                    <td>999</td>
                </tr>
                <tr>
                    <td>สันนอกสไลด์</td>
                    <td>เนื้อสัตว์</td>
                    <td>13/8/2024 15:06:15</td>
                    <td>999</td>
                </tr>
                <tr>
                    <td>สันนอกสไลด์</td>
                    <td>เนื้อสัตว์</td>
                    <td>13/8/2024 15:04:34</td>
                    <td>999</td>
                </tr>
            </tbody>
        </table>
    </section>
</body>

</html>
