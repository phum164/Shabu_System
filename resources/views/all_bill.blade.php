@extends('layouts.admin')
@section('title', 'show_bill')
@section('headline', 'บิลทั้งหมด')



@section('content')
    <link rel="stylesheet" href="{{ asset('css/allbill.css') }}">
    <div class="container">
        <section class="content-section">
            <div class="d-flex justify-content-between align-items-center">
                <div class="search-bar">
                    <form action="/allbill/search" method="GET">
                        <div class="input-group d-flex align-items-center">
                            <input class="form-control me-2" placeholder="บิล" type="number" name="sbill">
                            <input class="form-control me-2" placeholder="โต๊ะ" type="number" name="stabel">
                            <button type="submit" class="btn bg-primary text-white">ค้นหา</button>
                        </div>
                    </form>
                </div>
                <div class="alert alert-info text-center fw-bold" style="font-size: 1.2em;">
                    รายได้ทั้งหมด {{ number_format($total_incom, 0) }} บาท
                </div>
            </div>

            <table class="table-striped-light">
                <thead>
                    <tr>
                        <th>รหัสบิล</th>
                        <th>โต๊ะ</th>
                        <th>พนักงานผู้ทำรายการ</th>
                        <th>จำนวนคน</th>
                        <th>ราคารวมตามจำนวนคน</th>
                        <th>ค่าปรับ</th>
                        <th>ราคารวมทั้งหมด</th>
                        <th>วันเวลา</th>
                        <th>สถานะ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bills as $bill)
                        <tr>
                            <td>{{ $bill->id }}</td>
                            <td>{{ $bill->table_id }}</td>
                            <td>
                                @if ($bill->user)
                                    {{ $bill->user->name }}
                                @else
                                    ไม่พบข้อมูลพนักงาน
                                @endif
                            </td>
                            {{-- <td>{{ $bill->employee_id}}</td> --}}
                            <td>{{ $bill->person_amount }}</td>
                            <td>{{number_format($bill->all_person_pay,0)}}</td>
                            <td>{{number_format($bill->add_pay)}}</td>
                            <td>{{ number_format($bill->total_pay, 0) }}</td>
                            <td>{{ $bill->created_at->format('d-m-Y H:i') }}</td>
                            <td>
                                @if ($bill->status == 1)
                                    <a href="/Billadmin/{{$bill->id}}" class="btn btn-success">จ่ายแล้ว</a>
                                @else
                                    <a href="/Billadmin/{{$bill->id}}" class="btn btn-danger">ยังไม่จ่าย</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            {{ $bills->appends(request()->input())->links() }}
        </section>
    </div>
@endsection
