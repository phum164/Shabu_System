<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
    <form action="{{ route('edit_emp', $emp->id) }}" method="POST">
        @csrf
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
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
