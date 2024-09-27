@extends('layouts.layout')
@section('active')
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('Orderfood',['id'=>$id])}}">สั่งอาหาร</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('historyoder',['id'=>$id]) }}">ประวัติการสั่งอาหาร</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('totalprice') }}">ยอดรวมทั้งหมด</a>
        </li>
    </ul>
@endsection

@section('search')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{$bill_id = request()->get('bill_id');}}
    

    @if (session('success'))
        <script>
            Swal.fire({
                position: "center",
                icon: "success",
                title: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                position: "center",
                icon: "error",
                title: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    <h4>สั่งอาหาร โต๊ะ {{ $bill->table->name ?? 'N/A' }}</h4>
    @endsection
@section('catagory')
    <ul class="catagory">
        <li><a href="#" class="selected" data-category="all">ทั้งหมด</a></li>
        @foreach ($menuTypes as $type)
            <li><a href="#" data-category="{{ $type->id }}">{{ $type->name }}</a></li>
        @endforeach
    </ul>
@endsection
@section('sidebar')
    <div class="col-sm-12 col-md-3 sidebar order-md-last">
        <div class="listoder">
            <p><i class="bi bi-cart3"></i> รายการอาหารของคุณ</p>
            <div class="oderitem">
                <div class="oderlist">
                    <!-- รายการจะถูกเพิ่มที่นี่ -->
                </div>
            </div><br>
            <p>โต๊ะ: {{ $bill->table->name ?? 'ไม่พบข้อมูลโต๊ะ' }}</p>
               
            <form id="orderForm" method="POST" action="{{ route('listorders.store', ['id' => $bill->id]) }}">
                @csrf
                <button type="submit" id="submitOrder" class="comf">สั่งอาหาร</button>
            </form>
            


        </div>
    </div>
@endsection

@section('oder')
    @foreach ($menus as $menu)
        <div class="menu-item col-md-4" data-category="{{ $menu->menutype_id }}">
            <div class="p-3 border bg-light">
                <img src="{{ asset($menu->image) }}" alt="{{ $menu->name }}" width="300px" height="270px"><br><br>
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
                <a class="oderadd" href="#" data-image="{{ asset($menu->image) }}" data-name="{{ $menu->name }}"
                    data-id="{{ $menu->id }}" data-quantity="1">เพิ่มรายการอาหาร</a>
            </div>
        </div>
    @endforeach
@endsection


@push('js')
    <script src="{{ asset('js/script.js') }}"></script>
@endpush
