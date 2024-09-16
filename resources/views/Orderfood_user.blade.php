@extends('layout')
@section('active')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('Orderfood_user')}}" >สั่งอาหาร</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('historyoder')}}">ประวัติการสั่งอาหาร</a>
  </li>
  <li class="nav-item">
    <a class="nav-link"  href="{{ route('Totalprice')}}">ยอดรวมทั้งหมด</a>
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
  <li><a class="{{ $selected === null ? 'a2' : '' }}" href="{{ route('Orderfood_user') }}">ทั้งหมด</a></li>
  @foreach($menuTypes as $type)
    <li><a class="{{ $selected == $type->id ? 'a2' : '' }}" href="{{ route('Orderfood_user', ['id' => $type->id]) }}">{{ $type->name }}</a></li>
  @endforeach

</ul>
</ul>
@endsection
@section('sidebar')
<div class="col-sm-12 col-md-3 sidebar order-md-last">
  <div class="timeout">
    <p>คุณเหลือเวลาอีก</p>
    <p>1 : 59 : 59</p>
  </div>
  <div class="listoder">
    <p><i class="bi bi-cart3"></i>  รายการอาหารของคุณ</p>

    <div class="oderlist" id="listod">
     
    </div>

    <br>
    <p>โต๊ะ 1</p>
    <form id="orderForm" action="{{ route('order.submit') }}" method="POST">
      @csrf
      <input type="hidden" name="orderItems" id="orderItemsInput">
      <button type="submit" class="comf">สั่งอาหาร</button>
    </form>    
  
  </div>
</div>
@endsection

@section('oder')
@foreach($menus as $menu)
<div class="col-md-4">
  <div class="p-3 border bg-light">
      <img src="{{ asset($menu->image) }}" alt="{{ $menu->name }}" width="50%"><br><br>
      <p>{{ $menu->name }}</p>
      <hr>
      <div class="gbtnoder">
          <p>จำนวน</p>
          <div class="adbtn">
            <button class="del" onclick="delnum(event, this)"> - </button>
            <input class="numo" type="number" id="amount_{{ $menu->id }}" name="amount" value="1" min="1">
            <button class="add" onclick="addnum(event, this, {{ $menu->stock }})"> + </button>          </div>
      </div>
      <a class="oderadd" href="#" onclick="addItem(event, '{{ $menu->image }}', '{{ $menu->name }}', document.getElementById('amount_{{ $menu->id }}').value)">เพิ่มรายการอาหาร</a>
  </div>
</div>
@endforeach
@endsection

@section('js')
<script>
  function addnum(event, element, stock) {
    event.preventDefault(); 
    var quantityInput = element.previousElementSibling; 
    var currentValue = parseInt(quantityInput.value); 
    if (currentValue < stock) {
        quantityInput.value = currentValue + 1; 
    } else {
        alert('จำนวนสินค้าเกินสต็อกที่มีอยู่!');
    }
}

function delnum(event, element) {
    event.preventDefault(); 
    var quantityInput = element.nextElementSibling; 
    var currentValue = parseInt(quantityInput.value); 
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1; 
    } else {
        alert("ไม่สามารถลดต่ำกว่า 1 ได้!");
    }
}

function addItem(event, image, name, amount) {
    event.preventDefault();
    var orderList = document.getElementById('listod');
    var newItem = document.createElement('div');
    newItem.classList.add('oderlist');

    newItem.innerHTML = `
        <img class="imglist" src="${image}"><br><br>
        <div class="gbtnoder sib">
            <p style="font-size:13px;">${name}</p>
            <div class="adbtn">
                <a class="del" href="#" onclick="delnum(event, this)"> - </a>
                <input class="numo" type="number" value="${amount}" min="1" readonly>
                <a class="add" href="#" onclick="addnum(event, this)"> + </a>
                <a class="deletelist" href="#" onclick="delItem(event)"><i class="bi bi-trash3-fill"></i></a>
            </div>
        </div>
    `;

    orderList.appendChild(newItem);
}



function delItem(event) {
    event.preventDefault();

    var item = event.target.closest('.oderlist'); 
    if (item) {
        item.remove(); 
        updateOrderItems(); // Update hidden input field after removal
    }
}



    // ลบรายการ
    function delItem(event) {
    event.preventDefault();

    var item = event.target.closest('.oderlist'); 
    if (item) {
        item.remove(); 
    }
}
    
</script>

@endsection