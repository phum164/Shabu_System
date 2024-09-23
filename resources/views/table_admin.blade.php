@extends('layouts.layout_admin')
@push ('style')
        <link rel="stylesheet" href="/css/admin.css">
@endpush

@section('menu-active')
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="{{ route('home_admin') }}">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('table_admin' )}}">จัดการโต๊ะ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('menulist' )}}">รายการอาหารของลูกค้า</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('empdata')}}">ข้อมูลพนักงาน</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('stock')}}">แก้ไข เพิ่ม/ลบเมนู เช็คสต๊อค</a>
    </li>
  </ul>
@endsection


@section('menu')
<br><h2>การจัดการโต๊ะภายในร้าน</h2><br>
<div class="row">
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="table">
        <a href="{{ route('Managetable' )}}"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
    <p>โต๊ะ 1</p>
    <hr>
    <p class="status c">Close</p>
    <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> 2    ฿ 299</p>
    </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="table">
          <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
    <p>โต๊ะ 2</p>
    <hr>
    <p class="status o">Open</p>
    <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> -    ฿ 0</p>
    </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="table">
          <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
    <p>โต๊ะ 3</p>
    <hr>
    <p class="status o">Open</p>
    <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> -    ฿ 0</p>
    </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="table">
          <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
    <p>โต๊ะ 4</p>
    <hr>
    <p class="status o">Open</p>
    <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> -    ฿ 0</p>
    </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="table">
          <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
    <p>โต๊ะ 5</p>
    <hr>
    <p class="status o">Open</p>
    <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> -    ฿ 0</p>
    </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="table">
          <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
    <p>โต๊ะ 6</p>
    <hr>
    <p class="status o">Open</p>
    <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> -    ฿ 0</p>
    </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="table">
          <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
    <p>โต๊ะ 7</p>
    <hr>
    <p class="status o">Open</p>
    <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> -    ฿ 0</p>
    </div>
    </div>
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="table">
          <a href="#"><img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU"></a><br><br>
    <p>โต๊ะ 8</p>
    <hr>
    <p class="status o">Open</p>
    <p><i class="bi bi-person-fill"></i><em id="totalpeplo"></em> -    ฿ 0</p>
    </div>
    </div>
@endsection