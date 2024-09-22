@extends('layouts.layout')

@section('active')
<ul class="navbar-nav">
  <li class="nav-item">
    <a class="nav-link" href="{{ route('Orderfood')}}" >สั่งอาหาร</a>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="{{ route('historyoder')}}">ประวัติการสั่งอาหาร</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="{{ route('totalprice')}}">ยอดรวมทั้งหมด</a>
  </li>
</ul>
@endsection

@section('search')
<h4>ประวัติการสั่งอาหาร</h4>
@endsection

@section('catagory')
    <p>โชว์เวลาที่เหลือตรงนี้</p>
@endsection

@section('sidebar')

@endsection

@section('oder')
<div class="lishis">
    @foreach($orders as $order)
    <div class="historyOder">
        <label>สั่งไปเมื่อ {{ $order->created_at->diffForHumans() }}</label><br><br>
        <table>
            <tr>
                <td><img class="hisimg" src="{{ asset($order->menu->image) }}"></td>
                <td class="mg">{{ $order->menu->name }}</td>
                <td class="mg">จำนวน <br> {{ $order->amount }}</td>
                <td class="mg">
                    @if($order->status == 'processing')
                        กำลังดำเนินการ...
                    @elseif($order->status == 'completed')
                        เสร็จสิ้น
                    @else
                        {{ $order->status }}
                    @endif
                </td>
            </tr>
        </table>
    </div>
    <br>
    @endforeach
</div>
@endsection
