@extends('layouts.layout_admin')
@push ('style')
        <link rel="stylesheet" href="/css/admin.css">
@endpush

@section('menu-active')
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('home_admin') }}">หน้าหลัก</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('table_admin' )}}">จัดการโต๊ะ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('menulist' )}}">รายการอาหารของลูกค้า</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/empdata">ข้อมูลพนักงาน</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('showstock')}}">แก้ไข เพิ่ม/ลบเมนู เช็คสต๊อค</a>
    </li>
    
  </ul>
@endsection

@section('fixcon')
  <div class="container mt-4 mb-4">
@endsection

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
      <a class="btn" href="{{ route('menulist' )}}">รายการอาหารของลูกค้า</a> 
  </div>
</div>
<div class="col-sm-12 col-md-6 col-lg-4">
  <div class="content">
  <img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU">
      <a class="btn" href="/showstock">แก้ไข เพิ่ม/ลบเมนู เช็คสต๊อค</a> 
  </div>
</div>   
<div class="col-sm-12 col-md-6 col-lg-4">
  <div class="content">
  <img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU">
  <a class="btn" href="/empdata">ข้อมูลพนักงาน</a>
  </div>
</div>   
@endsection

