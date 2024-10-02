@extends('layouts.layout_admin')
@push('style')
    <link rel="stylesheet" href="/css/admin.css">
@endpush


@section('fixcon')
    <div class="container mt-4 mb-4">
    @endsection

    @section('menu')
        @if ((Auth::user()->position_id == 1 || Auth::user()->position_id == 4))
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="content">
                    <img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU">
                    <a class="btn manage-table" href="{{ route('table_admin') }}" id="manage-table">จัดการโต๊ะ</a>
                </div>
            </div>
        @endif

        @if ((Auth::user()->position_id == 1 || Auth::user()->position_id == 3))
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="content">
                    <img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU">
                    <a class="btn" href="{{ route('menulist') }}">รายการอาหารของลูกค้า</a>
                </div>
            </div>
        @endif

        @if ((Auth::user()->position_id == 1 || Auth::user()->position_id == 5))
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="content">
                    <img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU">
                    <a class="btn" href="/showstock">แก้ไข เพิ่ม/ลบเมนู เช็คสต๊อค</a>
                </div>
            </div>
        @endif

        @if ((Auth::user()->position_id == 1 || Auth::user()->position_id == 2))
            <div class="col-sm-12 col-md-6 col-lg-4">
                <div class="content">
                    <img src="{{ asset('img/table.png') }}" alt="รูปโลโก้ IT BEEF CHABU">
                    <a class="btn" href="/empdata">ข้อมูลพนักงาน</a>
                </div>
            </div>
        @endif
    @endsection
