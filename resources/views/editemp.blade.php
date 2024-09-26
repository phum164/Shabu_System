<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Edit Employee {{ $emp->id }}</title>
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
    <br>
    <br>
    <br>
    <form action="{{ route('edit_emp', $emp->id) }}" method="POST" style="margin: auto 0 0">
        @csrf
        <div class="emp my-25">
            <div class="form-group row align-items-center mb-3">
                <label for="id" class="col-sm-2 col-form-label">รหัสพนักงาน:</label>
                <div class="col-sm-10">
                    <input type="text" name="id" id="id" value="{{ $emp->id }}" class="form-control"
                        readonly>
                </div>
            </div>

            <div class="form-group row align-items-center mb-3">
                <label for="name" class="col-sm-2 col-form-label text-right">ชื่อ-นามสกุล:</label>
                <div class="col-sm-10">
                    <input type="text" name="name" id="name" value="{{ $emp->name }}" placeholder="{{ $emp->name }}"
                        class="form-control" required>
                </div>
            </div>

            <div class="form-group row align-items-center mb-3">
                <label for="position_salary" class="col-sm-2 col-form-label text-right">เงินเดือน:</label>
                <div class="col-sm-10">
                    <input type="number" name="position_salary" id="position_salary"
                        placeholder="{{ number_format($emp->position->sarary, 0) }}" class="form-control" disabled>
                </div>
            </div>

            <div class="form-group row align-items-center mb-3">
                <label for="position_name" class="col-sm-2 col-form-label">แผนก:</label>
                <div class="col-sm-10">
                    <select name="position_id" id="position_name" class="form-control" required>
                        @foreach ($position as $posi)
                            <option value="{{ $posi->id }}"{{ $posi->id == $emp->position_id ? ' selected' : '' }}>
                                {{ $posi->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row align-items-center mb-3">
                <label for="email" class="col-sm-2 col-form-label text-right">อีเมลล์:</label>
                <div class="col-sm-10">
                    <input type="email" name="email" id="email"
                        placeholder="{{ $emp ->email }}" class="form-control" value="{{ $emp ->email }}">
                </div>
            </div>

            <div class="form-group row align-items-center mb-3">
                <label for="tell_number" class="col-sm-2 col-form-label text-right">เบอร์:</label>
                <div class="col-sm-10">
                    <input type="tell" name="tell_number" id="tell_number"
                        placeholder="{{ $emp ->tell_number }}" class="form-control" value="{{ $emp ->tell_number }}" maxlength="10" pattern="[0-9]{10}">
                </div>
            </div>

            <input type="submit" class="btn btn-success" value="บันทึก">
            <a href="/empdata" class="btn btn-danger">ยกเลิก</a>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
