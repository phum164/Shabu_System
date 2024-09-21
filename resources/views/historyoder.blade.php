@extends('layouts.layout')
@section('active')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link " href="{{ route('Orderfood')}}" >สั่งอาหาร</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('historyoder')}}">ประวัติการสั่งอาหาร</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="{{ route('totalprice')}}">ยอดรวมทั้งหมด</a>
  </li>
</ul>
@endsection

@section('search')
<h4>ประวัติการสั่งอาหาร</h4>
@endsection

@section('catagory')
    <p>โชว์เวลาที่เหลือตรงนี้</p>
@endsection

@section('sidebar')

@endsection

@section('oder')
 
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

  
@endsection
        

    
    
