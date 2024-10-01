@extends('layouts.admin')
@section('title', 'stocks')
@section('headline', 'เพิ่มสต๊อกเมนู')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/stock.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: 'สำเร็จ!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                title: 'ข้อผิดพลาด!',
                text: "{{ $errors->first() }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'ข้อผิดพลาด!',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-4 mx-auto">
            </div>
            <div class="col-md-6">
            </div>
            <div class="col-md-2" id="addmenu">
                <a href="{{ route('Addmenuadmin') }}" class="btn btn-success" role="button">เพิ่มเมนูอาหาร</a>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-4 text-start">
                <form action="/showstock/search" method="GET">
                    <div class="input-group mb-4">
                        <span class="input-group-text"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input class="form-control" placeholder="Search" type="text" name="search">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($menus->isEmpty())
        <p style="text-align: center">ไม่พบเมนู</p>
    @else
        <table class="table-striped-columns mx-auto" style="width: 80%;">
            <thead>
                <tr>
                    <th class="text-white" scope="col">ID</th>
                    <th class="text-white" scope="col">Image</th>
                    <th class="text-white" scope="col">Name</th>
                    <th class="text-white" scope="col">Type</th>
                    <th class="text-white" scope="col">Stock</th>
                    <th class="text-white" scope="col">Among</th>
                    <th class="text-white" scope="col">EditMenu</th>
                    <th class="text-white" scope="col">DeletMenu</th>
                </tr>
            </thead>
            @foreach ($menus as $item)
                <tbody>
                    <tr>
                        <th scope="row da">{{ $item->id }}</th>
                        <td><img src="{{ asset($item->image) }}" alt="รูปเมนู" width="50" height="50"></td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->menutype->name }}</td>
                        <td>{{ number_format($item->stock, 0) }}</td>
                        <td>
                            <form method="POST" action="{{ route('add_stock', $item->id) }}"
                                class="d-flex jstify-content-evenly align-items-center flex-form"
                                onsubmit="confirmAddStock(event,'{{ $item->name }}', this.stock.value);">
                                @csrf
                                <input type="number" name="stock" class="form-control mx-2" maxlength="3" min="0"
                                    oninput="checkLength(this)" placeholder="จำนวน"
                                    style="width: 90px; height:40px; -moz-appearance: textfield;" required>
                                <button type="submit" class="btn btn-success">เพิ่มสต๊อก</button>
                            </form>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="/edit/{{ $item->id }}" role="button"
                                onclick="confirmEditStock(event,'{{ $item->name }}');">แก้ไข</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" href="/delete/{{ $item->id }}" role="button"
                                onclick="confirmDelete(event, '{{ $item->name }}')">ลบเมนู</a>

                        </td>
                    </tr>
                </tbody>
            @endforeach
        </table>
        </div>
        <div class="mt-3">
            @if (isset($search))
                {{ $menus->appends(['search' => $search])->links() }}
            @else
                {{ $menus->links() }}
            @endif
        </div>
    @endif

    <script>
        function checkLength(input) {
            const maxLength = 3; // จำนวนหลักสูงสุดที่อนุญาต
            if (input.value.length > maxLength) {
                input.value = input.value.slice(0, maxLength); // ตัดค่าที่เกินออก
            }
        }

        function confirmAddStock(ev, menuName, stockAmount) {
            ev.preventDefault();
            Swal.fire({
                title: "ยืนยันที่จะเพิ่มสต๊อก?",
                html: `<b>คุณต้องการเพิ่มเมนู <span style="color:#f39c12;">${menuName}</span> จำนวน <span
            style="color:#f39c12;">${stockAmount}</span> ใช่หรือไม่?</b>`,
                icon: "warning",
                showCancelButton: true,
                background: '#f2f2f2',
                confirmButtonColor: "#28a745",
                cancelButtonColor: "#d33",
                confirmButtonText: "<i class='fa fa-check'></i> ใช่, เพิ่มสต๊อก",
                cancelButtonText: "<i class='fa fa-times'></i> ยกเลิก",
                reverseButtons: true, // สลับตำแหน่งปุ่ม
            }).then((result) => {
                if (result.isConfirmed) {
                    ev.target.submit();
                }
            });
            return false;
        }

        function confirmEdit(ev, name) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            Swal.fire({
                title: "ยืนยันที่จะแก้ไข?",
                html: `<b>คุณต้องการแก้ไขเมนู <span style="color:#f39c12;">${name}</span> ใช่หรือไม่?</b>`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "<i class='fa fa-check'></i> ใช่, แก้ไข",
                cancelButtonText: "<i class='fa fa-times'></i> ยกเลิก",
                reverseButtons: true,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'เมนูถูกแก้ไข!',
                        text: 'แก้ไขเมนูเรียบร้อยแล้ว',
                        icon: 'success',
                        confirmButtonColor: '#28a745',
                    }).then(() => {
                        window.location.href = urlToRedirect;
                    });
                }
            });
        }

        function confirmEdit(ev, name) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            Swal.fire({
                title: "ยืนยันที่จะแก้ไข?",
                text: "คุณต้องการแก้ไขเมนู " + name,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes !"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = urlToRedirect;
                }
            });
        }

        function confirmDelete(ev, name) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            Swal.fire({
                title: "ยืนยันที่จะลบเมนู?",
                html: `<b>คุณต้องการลบเมนู <span style="color:#f39c12;">${name}</span> ใช่หรือไม่?</b>`,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "<i class='fa fa-trash'></i> ใช่, ลบ",
                cancelButtonText: "<i class='fa fa-times'></i> ยกเลิก",
                reverseButtons: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = urlToRedirect;
                }
            });
        }
    </script>


@endsection
