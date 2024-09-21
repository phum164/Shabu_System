@extends('layouts.admin')
@section('title', 'stock_menu')
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
                            <input type="number" name="stock" class="form-control w-50" placeholder="จำนวน">
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
