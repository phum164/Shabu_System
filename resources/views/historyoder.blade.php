@extends('layout')
@section('active')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link " href="{{ route('Orderfood_user')}}" >สั่งอาหาร</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('historyoder')}}">ประวัติการสั่งอาหาร</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="{{ route('Totalprice')}}">ยอดรวมทั้งหมด</a>
  </li>
</ul>
@endsection

@section('search')
<h4>ประวัติการสั่งอาหาร</h4>
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
  <div class="col-md-11 mt-3 ms-2">
    <div class="lishis">
    <label class="historyOder">สั่งไปเมื่อ 5 นาทีที่แล้ว</label><br><br>
     <table>
      <tr>
        <td><img class="hisimg" src="{{ asset('img/Pork/p1.png') }}"></td>
        <td class="mg">หมูสามชั้น</td>
        <td class="mg">จำนวน <br> 5</td>
        <td class="mg">กำลังดำเนินการ...</td>
      </tr>
     </table>
    </div>
  </div>
  
@endsection
        

    
    
