@extends('layouts.layout_admin')
@section('menu')
<div class="col-sm-12 col-md-6 col-lg-4">
  <div class="content">
  <img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU">  
  <a class="btn manage-table" href="{{ route('table_admin' )}}" id="manage-table">จัดการโต๊ะ</a> 
  </div>
</div>
<div class="col-sm-12 col-md-6 col-lg-4">
  <div class="content">
  <img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU">
      <a class="btn" href="#">รายการอาหารของลูกค้า</a> 
  </div>
</div>
<div class="col-sm-12 col-md-6 col-lg-4">
  <div class="content">
  <img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU">
  <a class="btn" href="#">ข้อมูลพนักงาน</a> 
  </div>
</div>
<div class="col-sm-12 col-md-6 col-lg-4">
  <div class="content">
  <img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU">
      <a class="btn" href="#">แก้ไข เพิ่ม/ลบเมนู เช็คสต๊อค</a> 
  </div>
</div>   
@endsection