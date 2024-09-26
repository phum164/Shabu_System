@extends('layouts.admin')
@section('title', 'stock_menu')


@section('headline', 'เพิ่มสต๊อกเมนู')
@section('content')

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
                        <form method="POST" action="{{ route('add_stock', $item->id) }}" class="d-flex align-items-center"
                            onsubmit="confirmAddStock(event,'{{ $item->name }}', this.stock.value);">
                            @csrf
                            <input type="number" name="stock" class="form-control w-25 me-2" placeholder="จำนวน">
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

    <div class="mt-3">
        {{ $menus->links() }}
    </div>

    <script>
        function confirmAddStock(ev, menuName, stockAmount) {
            ev.preventDefault();
            Swal.fire({
                title: "ยืนยันที่จะเพิ่มสต๊อก?",
                html: `<b>คุณต้องการเพิ่มเมนู <span style="color:#f39c12;">${menuName}</span> จำนวน <span style="color:#f39c12;">${stockAmount}</span> ใช่หรือไม่?</b>`,
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
                    Swal.fire({
                        title: 'สต๊อกถูกเพิ่มแล้ว!',
                        text: 'เพิ่มสต๊อกเรียบร้อยแล้ว',
                        icon: 'success',
                        confirmButtonColor: '#28a745',
                    }).then(() => {
                        ev.target.submit();
                    });
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
                confirmButtonColor: "#d33", // ปรับปุ่มยืนยันเป็นสีแดง
                cancelButtonColor: "#3085d6",
                confirmButtonText: "<i class='fa fa-trash'></i> ใช่, ลบ",
                cancelButtonText: "<i class='fa fa-times'></i> ยกเลิก",
                reverseButtons: false,
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'เมนูถูกลบ!',
                        text: 'ลบเมนูเรียบร้อยแล้ว',
                        icon: 'success',
                        confirmButtonColor: '#28a745',
                    }).then(() => {
                        window.location.href = urlToRedirect;
                    });
                }
            });
        }
    </script>


@endsection
