@extends('layouts.layout')

@section('active')
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('Orderfood',['id'=>$id]) }}">สั่งอาหาร</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('historyoder',['id'=>$id]) }}">ประวัติการสั่งอาหาร</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('totalprice') }}">ยอดรวมทั้งหมด</a>
        </li>
    </ul>
@endsection


@section('catagory')
    <h4 class="text-center">ประวัติการสั่งอาหาร</h4>
    <p class="text-center">โชว์เวลาที่เหลือตรงนี้</p> <br>
@endsection

@section('oder')
    <div class="lishis">
        @php
            $currentDateTime = null;
        @endphp

        @foreach ($hisorders as $order)
            @php
                $orderDateTime = $order->created_at->format('H:i');
            @endphp

            @if ($currentDateTime !== $orderDateTime)
                @if ($currentDateTime !== null)
                    </div> 
                </div> 
                @endif

                @php
                    $currentDateTime = $orderDateTime; 
                @endphp
                <div class="historyOderGroup mb-4 my-2">
                    <div class="card shadow-sm">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0">คำสั่งซื้อเมื่อ {{ $order->created_at->diffForHumans() }}</h5>
                        </div>
                        <div class="card-body">
                @endif

            <div class="historyOder mb-3">
                <div class="row align-items-center">
                    <div class="col-2">
                        <img class="hisimg img-fluid" src="{{ asset($order->menu->image) }}" alt="Menu Image">
                    </div>
                    <div class="col-4">
                        <h6>{{ $order->menu->name }}</h6>
                    </div>
                    <div class="col-3">
                        <h6>จำนวน: {{ $order->amount }}</h6>
                    </div>
                    <div class="col-2">
                        <h6>
                            @if ($order->status == 0)
                                <b style="color: darkorange">กำลังดำเนินการ...</b>
                            @elseif($order->status == 1)
                                <b style="color: chartreuse">เสร็จสิ้น</b>
                            @else
                                <b style="color: crimson">ยกเลิกรายการ</b>
                            @endif
                        </h6>
                    </div>
                </div>
            </div>

        @endforeach

        @if ($currentDateTime !== null)
            </div>
        </div>
        @endif
    </div>
@endsection
