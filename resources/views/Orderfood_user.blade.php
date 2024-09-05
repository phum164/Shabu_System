@extends('layout')
@section('search')
<h4>สั่งอาหาร  <span class="Serch"></h4>
  <div class="box">
      <input class="s-t" type="text" name="" id="" placeholder="ค้นหารายการอาหารที่ต้องการ...">
      <a class="icon-s" href="#"><i class="bi bi-search sc"></i></a>
  </div>
@endsection
@section('catagory')
<ul class="catagory">
  <li><a class="active a2" href="#">ทั้งหมด</a></li>
  <li><a href="#">เนื้อสัตว์</a></li>
  <li><a href="#">ผัก</a></li>
  <li><a href="#">รายการอาหารอื่นๆ</a></li>
  <li><a href="#">ของทานเล่น</a></li>
  <li><a href="#">บริการอื่นๆ</a></li>
@endsection
@section('sidebar')
<div class="col-sm-12 col-md-3 sidebar order-md-last">
  <div class="timeout">
    <p>คุณเหลือเวลาอีก</p>
    <p>1 : 59 : 59</p>
  </div>
  <div class="listoder">
    <p><i class="bi bi-cart3"></i>  รายการอาหารของคุณ</p>
    <div class="oderlist">
      <img class="imglist" src="{{ asset('img/Pork/p1.png') }}"><br><br>
      <div class="gbtnoder sib">
        <p>หมูสามชั้น</p>
        <div class="ml-auto">
          <a class="del" href="#"> - </a>
          <label class="numoder"> 1 </label>
          <a class="add" href="#"> + </a>
        </div>
      </div>

    </div><br>
    <p>โต๊ะ 1</p>
    <a class="comf" href="#">สั่งอาหาร</a>
  </div>
</div>
@endsection

@section('oder')
  <img src="{{ asset('img/Pork/p1.png') }}"><br><br>
  <p> หมูสามชั้น</p>
  <hr>
  <div class="gbtnoder">
    <p>จำนวน</p>
    <div class="ml-auto">
      <a class="del" href="#"> - </a>
      <label class="numoder"> 1 </label>
      <a class="add" href="#"> + </a>
    </div>
  </div>
  <a class="oderadd" href="#">เพิ่มรายการอาหาร</a>
@endsection