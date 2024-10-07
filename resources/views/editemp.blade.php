@extends('layouts.admin')
@section('title', 'Edit_Emp')
@section('headline', 'แก้ไขข้อมูลพนักงาน')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/stock.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/empdata.css') }}">
    <form action="{{ route('edit_emp', $emp->id) }}" method="POST" style="margin: auto 0 0">
        @csrf
        <div class="emp my-25">
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="form-group row align-items-center mb-3">
                <label for="id" class="col-sm-2 col-form-label">รหัสพนักงาน:</label>
                <div class="col-sm-10">
                    <input type="text" name="id" id="id" value="{{ $emp->id }}" class="form-control"
                        readonly hidden>
                    <input type="text" name="id" id="id" value="{{ $emp->id }}" class="form-control"
                        disabled>
                </div>
            </div>

            <div class="form-group row align-items-center mb-3">
                <label for="name" class="col-sm-2 col-form-label text-right">ชื่อ-นามสกุล:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" value="{{ $emp->name }}"
                        placeholder="{{ $emp->name }}" class="form-control" required>
                </div>
            </div>

            <div class="form-group row align-items-center mb-3">
                <label for="position_salary" class="col-sm-2 col-form-label text-right">เงินเดือน:</label>
                <div class="col-sm-10">
                    <input type="number" name="position_salary" id="position_salary"
                        placeholder="{{ number_format($emp->position->salary, 0) }}" class="form-control" disabled>
                </div>
            </div>

            <div class="form-group row align-items-center mb-3">
                <label for="position_name" class="col-sm-2 col-form-label">แผนก:</label>
                <div class="col-sm-10">
                    <select name="position_id" id="position_name" class="form-control" required>
                        @foreach ($position as $posi)
                            @if ($posi->id != 1 && $posi->id != 2)
                                <option value="{{ $posi->id }}">{{ $posi->name }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row align-items-center mb-3">
                <label for="email" class="col-sm-2 col-form-label text-right">อีเมล:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email" placeholder="{{ $emp->email }}"
                        class="form-control" value="{{ $emp->email }}">
                </div>
            </div>

            <div class="form-group row align-items-center mb-3">
                <label for="tell_number" class="col-sm-2 col-form-label text-right">เบอร์:</label>
                <div class="col-sm-10">
                    <input type="tell" name="tell_number" id="tell_number" placeholder="{{ $emp->tell_number }}"
                        class="form-control" value="{{ $emp->tell_number }}" maxlength="10" pattern="[0-9]{10}">
                </div>
            </div>

            <input type="submit" class="btn btn-success" value="บันทึก">
            <a href="/empdata" class="btn btn-danger">ยกเลิก</a>
        </div>
    </form>
@endsection
