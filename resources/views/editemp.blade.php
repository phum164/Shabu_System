<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/empdata.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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

    <form action="{{ route('/empdata', $employees->id) }}" method="POST">
        @csrf
        @foreach ($employees as $emp)
            <div class="emp">
                <div class="form-group row align-items-center mb-3">
                    <label for="id" class="col-sm-2 col-form-label">รหัสพนักงาน:</label>
                    <div class="col-sm-10">
                        <input type="text" name="id" id="id" value="{{ $emp->id }}"
                            class="form-control" readonly>
                    </div>
                </div>

                <div class="form-group row align-items-center mb-3">
                    <label for="name" class="col-sm-2 col-form-label text-right">ชื่อ-นามสกุล:</label>
                    <div class="col-sm-10">
                        <input type="text" name="name" id="name"
                            placeholder="{{ $emp->name }} class="form-control">
                    </div>
                </div>

                <div class="form-group row align-items-center mb-3">
                    <label for="position_salary" class="col-sm-2 col-form-label text-right">เงินเดือน:</label>
                    <div class="col-sm-10">
                        <input type="number" name="position_salary" id="position_salary"
                            placeholder="{{ $emp->position->sarary }}" class="form-control">
                    </div>
                </div>

                <div class="form-group row align-items-center mb-3">
                    <label for="position_name" class="col-sm-2 col-form-label">แผนก:</label>
                    <div class="col-sm-10">
                        <input type="text" name="position_name" id="position_name"
                            placeholder="{{ $emp->position->name }}" class="form-control">
                    </div>
                </div>

                <input type="submit" class="btn btn-primary" value="บันทึก">
                <a href="{{ url()->previous() }}" class="btn btn-danger">ยกเลิก</a>
            </div>
        @endforeach
    </form>
</body>

</html>
