@extends('layout')
@section('active')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link " href="{{ route('Orderfood_user')}}" >สั่งอาหาร</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('historyoder')}}">ประวัติการสั่งอาหาร</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active"  href="{{ route('Totalprice')}}">ยอดรวมทั้งหมด</a>
  </li>
</ul>
@endsection