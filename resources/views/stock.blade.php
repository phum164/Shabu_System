@extends('layouts.admin')
@section('title', 'stock_menu')
@section('menu-active')
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link " href="{{ route('home_admin') }}">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('table_admin' )}}">จัดการโต๊ะ</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('menulist' )}}">รายการอาหารของลูกค้า</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="{{ route('empdata')}}">ข้อมูลพนักงาน</a>
    </li>
    <li class="nav-item">
      <a class="nav-link active" href="{{ route('stock')}}">แก้ไข เพิ่ม/ลบเมนู เช็คสต๊อค</a>
    </li>
  </ul>
@endsection
@section('headline', 'เพิ่มสต๊อกเมนู')
@section('content')

    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-4-mx-auto">
                @if (session('success'))
                    <div class="alert alert-success text-center">
                        <b>{{ session('success') }}</b>
                    </div>
                @endif
                @if ($errors->has('stock'))
                    <div class="alert alert-danger text-center">
                        <b>{{ $errors->first('stock') }}</b>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <table class="table-striped-columns mx-auto" style="width: 80%;">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Type</th>
                <th scope="col">Stock</th>
                <th scope="col">Among</th>
                <th scope="col">EditMenu</th>
                <th scope="col">DeletMenu</th>
            </tr>
        </thead>
        @foreach ($menus as $item)
            <tbody>
                <tr>
                    <th scope="row da">{{ $item->id }}</th>
                    <td><img src="{{ asset($item->image) }}" alt="รูปเมนู" width="50" height="50"></td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->menutype->name }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        <form method="POST" action="{{ route('add_stock', $item->id) }}" class="d-flex align-items-center" onsubmit="return confirmAddStock('{{ $item->name }}', this.stock.value);">
                            @csrf
                            <input type="number" name="stock" class="form-control w-25 me-2" placeholder="จำนวน">
                            <button type="submit" class="btn btn-success">เพิ่มสต๊อก</button>
                        </form>
                    </td>
                    <td>
                        <a class="btn btn-warning" href="/edit/{{$item->id}}" role="button" onclick="return confirm('คุณต้องการแก้ไขเมนู {{$item->name}} หรือไม่?');">แก้ไข</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="/delete/{{$item->id}}" role="button" onclick="return confirm('คุณต้องการลบเมนู {{$item->name}} หรือไม่?');">ลบเมนู</a>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
    <div class="mt-3">
        {{ $menus->links() }}
    </div>
    <script>
        function confirmAddStock(menuName, stockAmount) {
            return confirm(`คุณต้องการเพิ่มสต๊อกเมนู "${menuName}" จำนวน ${stockAmount} หรือไม่?`);
        }
    </script>
@endsection
