@extends('layouts.layout_admin')
@push('style')
    <link rel="stylesheet" href="/css/admin.css">
@endpush



@section('fixcon')
    <div class="container mt-5 mb-3">
    @endsection
    @section('menu')
        <link rel="stylesheet" href="{{ asset('css/stock.css') }}">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        @if (session('success'))
            <script>
                Swal.fire({
                    title: 'สำเร็จ!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    timer: 1000,
                    showConfirmButton: false,
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

        <br>
        <h2>การจัดการโต๊ะภายในร้าน</h2><br>
        <div class="row mt-3">
            @foreach ($tables as $table)
                <div class="col-sm-12 col-md-6 col-lg-3">
                    <div class="table">
                        <a href="{{ route('Managetable', ['id' => $table->id]) }}">
                            <img src="{{ asset('img/table.png') }}" alt="รูปโต๊ะ">
                        </a><br><br>
                        <p>โต๊ะ {{ $table->id }}</p>
                        <hr>
                        @if ($table->status == 1)
                            <p class="status o">Open</p>
                        @else
                            <p class="status c">Close</p>
                        @endif

                        <p>
                            <i class="bi bi-person-fill"></i>
                            @if ($table->status == 0)
                                {{ $table->bill->last()->person_amount }} คน
                                ฿ {{ number_format($table->bill->last()->total_pay,0) }}
                            @else
                                0 คน ฿ 0
                            @endif
                        </p>

                    </div>
                </div>
            @endforeach
        </div>
    @endsection
