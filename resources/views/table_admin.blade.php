@extends('layouts.layout_admin')

@push('style')
    <link rel="stylesheet" href="/css/admin.css">
@endpush

@section('menu')
<br><h2>การจัดการโต๊ะภายในร้าน</h2><br>
<div class="row">
    @foreach ($tables as $table)
    <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="table">
            <!-- ลิงก์ไปที่หน้า managetableadmin.blade.php โดยส่ง id ของโต๊ะ -->
            <a href="{{ route('Managetable', ['id' => $table->id]) }}">
                <img src="{{ asset('img/table.png') }}" alt="รูปโต๊ะ">
            </a><br><br>
            <p>โต๊ะ {{ $table->id }}</p>
            <hr>
            <!-- ตรวจสอบสถานะของโต๊ะ -->
            @if ($table->status == 1)
                <p class="status o">Open</p>
            @else
                <p class="status c">Close</p>
            @endif
            <p>
                <i class="bi bi-person-fill"></i>
                @if($table->bill && $table->bill->count() != 0)
                    {{ $table->bill->last()->person_amount }} คน
                    ฿ {{ $table->bill->last()->total_pay }}
                @else
                    0 คน ฿ 0 
                @endif
            </p>
        </div>
    </div>
    @endforeach
</div>
@endsection
