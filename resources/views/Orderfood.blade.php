@extends('layouts.layout')
@section('active')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('Orderfood')}}" >สั่งอาหาร</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('historyoder')}}">ประวัติการสั่งอาหาร</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="{{ route('totalprice')}}">ยอดรวมทั้งหมด</a>
  </li>
</ul>
@endsection
@section('search')
<h4>สั่งอาหาร  <span class="Serch"></h4>
  <div class="box">
      <input class="s-t" type="text" name="" id="" placeholder="ค้นหารายการอาหารที่ต้องการ...">
      <a class="icon-s" href="#"><i class="bi bi-search sc"></i></a>
  </div>
@endsection
@section('catagory')

<ul class="catagory">
  <li><a href="#" class="selected" data-category="all">ทั้งหมด</a></li>
  @foreach($menuTypes as $type)
  <li><a href="#" data-category="{{ $type->id }}">{{ $type->name }}</a></li>
  @endforeach
</ul>

@endsection
@section('sidebar')

<div class="col-sm-12 col-md-3 sidebar order-md-last">
  <div class="timeout">
    <p>คุณเหลือเวลาอีก</p>
    <p>1 : 59 : 59</p>
  </div>
  <div class="listoder">
    <p><i class="bi bi-cart3"></i> รายการอาหารของคุณ</p>
    <div class="oderitem">
      <div class="oderlist">
        <!-- รายการจะถูกเพิ่มที่นี่ -->
      </div>
    </div><br>
    <p>โต๊ะ 1</p>

    <form id="orderForm" method="POST" action="{{ route('listorders.store') }}">
      @csrf
      <input type="hidden" value="">
      <button type="submit" id="submitOrder" class="comf">สั่งอาหาร</button>
    </form>

    @if (session('success'))
      <div class="alert alert-success">
      {{ session('success') }}
      </div>
    @endif

  </div>
</div>



@endsection

@section('oder')
@foreach($menus as $menu)
<div class="menu-item col-md-4" data-category="{{ $menu->menutype_id }}">
  <div class="p-3 border bg-light">
      <img src="{{ asset($menu->image) }}" alt="{{ $menu->name }}" width="50%"><br><br>
      <p>{{ $menu->name }}</p>
      <hr>
      <div class="gbtnoder">
          <p>จำนวน</p>
          <div class="adbtn">
            <button class="del" onclick="changeAmount(-1, event)"> - </button>
            <input class="numo" type="number" name="amount" value="1" min="1">
            <button class="add" onclick="changeAmount(1, event)"> + </button>
          </div>
      </div>
      <a class="oderadd" href="#" data-image="{{ asset($menu->image) }}" data-name="{{ $menu->name }}" data-id="{{ $menu->id }}" data-quantity="1">เพิ่มรายการอาหาร</a>
    </div>
</div>
@endforeach
@endsection

@push('js')

<script src="{{asset('js/script.js')}}"></script>    

@endpush

