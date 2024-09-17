@extends('layout_admin')

@section('menu')
<div class="container" style="max-width: 500px; margin-top: 50px;">
    <!-- คำว่า "เพิ่มเมนูอาหาร" ที่แยกออกจากบล็อก -->
    <h2 class="text-center mb-4">เพิ่มเมนูอาหาร</h2>

    <div class="card shadow" style="border-radius: 10px;">
        <div class="card-body">
            <form action="/upload-menu" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- ส่วนอัปโหลดรูปภาพ -->
                <div class="form-group text-center">
                    <label for="menuImage" class="d-block"> 
                    <div style="border: 2px solid #ccc; padding: 30px; border-radius: 10px;">
                            <img src="/images/placeholder.png" id="previewImage" alt="เลือกอัปโหลดรูปภาพ" class="img-fluid" style="max-width: 100px; cursor: pointer;">
                            <p>เพิ่มรูปภาพ</p>
                        </div>
                    </label>
                    <input type="file" id="menuImage" name="menuImage" class="d-none" onchange="previewImage(event)">
                </div>

                <!-- กรอกชื่อเมนู -->
                <div class="form-group">
                    <label for="menuName">กรอกชื่อเมนูที่ต้องการเพิ่ม</label>
                    <input type="text" class="form-control" id="menuName" name="menuName" placeholder="ชื่อเมนู" required>
                </div>

                <!-- เลือกหมวดหมู่ -->
                <div class="form-group">
                    <label for="menuCategory">เลือกหมวดหมู่</label>
                    <select class="form-control" id="menuCategory" name="menuCategory" required>
                        <option value="meat">เนื้อสัตว์</option>
                        <option value="vegetable">ผัก</option>
                        <option value="other_food">รายการอาหารอื่นๆ</option>
                        <option value="snack">ของทานเล่น</option>
                        <option value="service">บริการอื่นๆ</option>
                    </select>
                </div>

                <!-- ปุ่มยืนยันและยกเลิกในแถวเดียวกัน -->
                <div class="text-center">
                    <button type="submit" class="btn btn-success mr-2 rounded-pill" style="width: 150px;">ยืนยันเพิ่มเมนู</button>
                    <a href="/admin-menu" class="btn btn-danger rounded-pill" style="width: 150px;">ยกเลิก</a>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- CSS -->
<style>
    .container {
        max-width: 500px; /* ลดความกว้างของบล็อกฟอร์ม */
    }
    .card {
        border-radius: 10px; /* ทำให้ขอบการ์ดมน */
        border: 1px solid #ccc; /* เพิ่มเส้นขอบบาง ๆ */
    }
    .form-group label {
        font-weight: bold;
    }
    #previewImage {
        width: 100px;
        height: 100px;
        object-fit: cover;
    }
    h2 {
        font-weight: bold;
        margin-bottom: 30px;
    }
    .form-control {
        border-radius: 5px; /* ปรับให้ขอบมนเล็กน้อย */
    }
    .btn {
        border-radius: 50px; /* ปรับปุ่มให้กลม */
    }
</style>

<!-- JavaScript สำหรับแสดงภาพตัวอย่าง -->
<script>
    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('previewImage');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<!-- Bootstrap CDN -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endsection
