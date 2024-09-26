<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ประวัติการจัดการแก้ไข</title>
    <link rel="stylesheet" href="{{ asset('css/edithistory.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header>
        <div class="header-title">
            <h1>IT BEEF chabu</h1>
        </div>
    </header>
    <br>
    <section class="content-section">
        <h2>ประวัติบิล</h2>

        <div class="search-bar">
            <input type="text" placeholder="ค้นหาเมนูที่ต้องการ">
        </div>

        <table>
            <thead>
                <tr>
                    <th>IDบิล</th>
                    <th>พนักงานผู้ทำรายการ</th>
                    <th>จำนวนคน</th>
                    <th>โต๊ะ</th>
                    <th>วันที่</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bills as $bill)
                    <tr>
                        <td>{{$bill->id}}</td>
                        <td>{{$bill->employee_id}}</td>
                        <td>{{$bill->table_id}}</td>
                        <td>{{$bill->person_amount}}</td>
                        <td>{{$bill->total_pay}}</td>
                        <td>{{$bill->created_at->format('Y-m-d H:i')}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</body>

</html>
