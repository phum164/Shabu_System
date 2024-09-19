@extends('layouts.admin')
@section('title', 'stock_menu')
@section('headline', 'เพิ่มสต๊อกเมนู')
@section('content')


    <table class="table-striped-columns mx-auto" style="width: 80%;">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if ($errors->has('stock'))
                        <div class="alert alert-danger">
                            {{ $errors->first('stock') }}
                        </div>
                    @endif
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Image</th>
                <th scope="col">Type</th>
                <th scope="col">Name</th>
                <th scope="col">Stock</th>
                <th scope="col">Among</th>
                <th scope="col">Addstock</th>
            </tr>
        </thead>
        @foreach ($menus as $item)
            <tbody>
                <tr>
                    <th scope="row da">{{ $item->id }}</th>
                    <td><img src="{{ asset($item->image) }}" alt="รูปเมนู" width="50" height="50"></td>
                    <td>{{ $item->menutype->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->stock }}</td>
                    <td>
                        <form method="POST" action="{{ route('add_stock', $item->id) }}">
                            @csrf
                            <input type="number" name="stock" class="form-control" placeholder="จำนวน">
                    </td>
                    <td>
                        <button type="submit" class="btn btn-warning">เพิ่มสต๊อก</button>
                        </form>
                    </td>
                </tr>
            </tbody>
        @endforeach
    </table>
    <div class="mt-3">
        {{ $menus->links() }}
    </div>

@endsection
