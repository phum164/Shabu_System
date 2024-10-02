@extends('layouts.layout_admin')

@section('menu')
    <!-- CSS -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:wght@400;500;600&display=swap');

        body {
            background-color: rgb(255, 255, 255);
            font-family: 'kanit', sans-serif;
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .container {
            max-width: 500px;
            /* ลดความกว้างของบล็อกฟอร์ม */
        }

        .card {
            border-radius: 10px;
            /* ทำให้ขอบการ์ดมน */
            border: 1px solid #ccc;
            /* เพิ่มเส้นขอบบาง ๆ */
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
            border-radius: 5px;
            /* ปรับให้ขอบมนเล็กน้อย */
        }

        .btn {
            border-radius: 50px;
            /* ปรับปุ่มให้กลม */
        }
    </style>
    <div>
        @if (session('error'))
            <div class="alert alert-warning text-center">
                <b>{{ session('error') }}</b>
            </div>
        @endif
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('menuImage').addEventListener('change', previewImage);
        });

        function previewImage(event) {
            const reader = new FileReader(); // สร้าง FileReader เพื่ออ่านไฟล์
            const imageField = document.getElementById("previewImage"); // ตัวแสดงรูปภาพ (img)

            console.log(event.target.files[0]);

            reader.onload = function() {
                // เมื่อไฟล์ถูกโหลดสำเร็จ นำค่าที่อ่านได้มาเป็น source ของรูป
                imageField.src = reader.result;
            }

            // อ่านไฟล์ที่ถูกอัปโหลด
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>

    <div class="container" style="max-width: 500px; margin-top: 50px;">
        <!-- คำว่า "เพิ่มเมนูอาหาร" ที่แยกออกจากบล็อก -->
        <h2 class="text-center mb-4">{{ isset($editmenu) ? 'แก้ไขเมนูอาหาร' : 'เพิ่มเมนูอาหาร' }}</h2>

        <div class="card shadow" style="border-radius: 10px;">
            <div class="card-body">
                @if ($errors->has('menuName'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ $errors->first('menuName') }}
                        <button type="button" class="btn-close align-middle fade show" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>
                @endif
                {{-- <form action="/insertmenu" method="POST" enctype="multipart/form-data"> --}}
                <form action="{{ isset($editmenu) ? route('editmenu', $editmenu->id) : route('insertmenu') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @if (isset($editmenu))
                        @method('PUT')
                    @endif
                    <!-- ส่วนอัปโหลดรูปภาพ -->
                    <div class="form-group text-center">
                        <label for="menuImage" class="d-block">
                            <div style="border: 2px solid #ccc; padding: 30px; border-radius: 10px;">
                                {{-- <img src="" id="previewImage" alt="เลือกอัปโหลดรูปภาพ" class="img-fluid"
                                    style="max-width: 100px; cursor: pointer;"> --}}
                                {{-- <p>เพิ่มรูปภาพ</p> --}}
                                <img src="{{ isset($editmenu) ? asset($editmenu->image) : '' }}" id="previewImage"
                                    alt="อัปโหลดรูปภาพ" class="img-fluid" style="max-width: 100px; cursor: pointer;">
                                <p>{{ isset($editmenu) ? 'แก้ไขรูปภาพ' : 'เพิ่มรูปภาพ' }}</p>
                            </div>
                        </label>
                        <input type="file" id="menuImage" name="menuImage" class="d-none" onchange="previewImage(event)">
                    </div>

                    <!-- กรอกชื่อเมนู -->
                    <div class="form-group">
                        <label for="menuName">กรอกชื่อเมนู</label>
                        <input type="text" class="form-control" id="menuName" name="menuName" placeholder="ชื่อเมนู"
                            value="{{ isset($editmenu) ? $editmenu->name : '' }}" required>
                    </div>

                    <!-- เลือกหมวดหมู่ -->
                    <div class="form-group">
                        <label for="menuCategory">เลือกหมวดหมู่</label>
                        <select class="form-control" id="menuCategory" name="type_id" required>
                            @foreach ($types as $type)
                                <option
                                    value="{{ $type->id }}"{{ isset($editmenu) && $editmenu->menutype_id == $type->id ? ' selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- ปุ่มยืนยันและยกเลิกในแถวเดียวกัน -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success mr-2 rounded-pill" style="width: 150px;">
                            {{ isset($editmenu) ? 'ยืนยันแก้ไขเมนู' : 'ยืนยันเพิ่มเมนู' }}
                        </button>
                        <a href="/showstock" class="btn btn-danger rounded-pill" style="width: 150px;">ยกเลิก</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
@endsection
