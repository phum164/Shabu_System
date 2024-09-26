<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/empdata.css') }}">
</head>

<body>
    <header>
        <div class="header-title">
            <h1>IT BEEF chabu</h1>
        </div>
        <div class="search">
            <input type="text" placeholder="ค้นหา">
        </div>
    </header>
    <form action="{{ route('/empdata', $employees->emp) }}" method="POST">
        @csrf
        @foreach ($employees as $emp)
            <div class="emp">
                <b class="emp-id"></b>
                <input type="text" name="id" value="{{ $emp->id }}" class="form-control" readonly>
                <p>ชื่อ-นามสกุล: </p>
                <input type="text" name="name" value="{{ $emp->name }}" class="form-control">
                <p>เงินเดือน: </p>
                <input type="text" name="position_salary" value="{{ $emp->position->sarary }}" class="form-control">
                <p>แผนก: </p>
                <input type="text" name="position_name" value="{{ $emp->position->name }}" class="form-control">

                <input type="submit" class="btn btn-primary" value="บันทึก">
                <a href="{{ url()->previous() }}" class="btn btn-danger">ยกเลิก</a>
            </div>
        @endforeach
    </form>
</body>

</html>
