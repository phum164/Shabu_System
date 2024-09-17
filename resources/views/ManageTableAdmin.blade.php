<!-- หน้าจัดการในแต่ละโต๊ะ -->
@extends('layout_admin')
@section('menu')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ManageTable</title>
    <link rel="stylesheet" href="admin.css">
     
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Left Column (Table Status) -->
        <div class="col-md-4 bg-white p-3">
            <div class="table-list">
                <!-- Table 1 -->
                <div class="table-status mb-3 selectable-table" id="table-1" onclick="selectTable(1)">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="table-info">โต๊ะ: 1</div>
                        <div class="people-info">จำนวนคน: 2</div>
                    </div>
                    <div class="time-remaining text-black">1:59:59</div>
                </div>
                <!-- Table 2 -->
                <div class="table-status mb-3 selectable-table" id="table-2" onclick="selectTable(2)">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="table-info">โต๊ะ: 2</div>
                        <div class="people-info">จำนวนคน: 4</div>
                    </div>
                    <div class="time-remaining text-black">0:00:00</div>
                </div>
                <!-- Add more tables as needed -->
                <div class="table-status mb-3 selectable-table" id="table-3" onclick="selectTable(3)">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="table-info">โต๊ะ: 3</div>
                        <div class="people-info">จำนวนคน: 3</div>
                    </div>
                    <div class="time-remaining text-black">0:45:30</div>
                </div>
                <div class="table-status mb-3 selectable-table" id="table-4" onclick="selectTable(4)">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="table-info">โต๊ะ: 4</div>
                        <div class="people-info">จำนวนคน: 5</div>
                    </div>
                    <div class="time-remaining text-black">0:00:00</div>
                </div>
                <div class="table-status mb-3 selectable-table" id="table-5" onclick="selectTable(5)">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="table-info">โต๊ะ: 5</div>
                        <div class="people-info">จำนวนคน: 4</div>
                    </div>
                    <div class="time-remaining text-black">1:15:10</div>
                </div>
                <div class="table-status mb-3 selectable-table" id="table-6" onclick="selectTable(6)">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="table-info">โต๊ะ: 6</div>
                        <div class="people-info">จำนวนคน: 6</div>
                    </div>
                    <div class="time-remaining text-black">0:00:00</div>
                </div>
                <div class="table-status mb-3 selectable-table" id="table-7" onclick="selectTable(7)">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="table-info">โต๊ะ: 7</div>
                        <div class="people-info">จำนวนคน: 2</div>
                    </div>
                    <div class="time-remaining text-black">1:30:50</div>
                </div>
                <div class="table-status mb-3 selectable-table" id="table-8" onclick="selectTable(8)">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="table-info">โต๊ะ: 8</div>
                        <div class="people-info">จำนวนคน: 8</div>
                    </div>
                    <div class="time-remaining text-black">0:00:00</div>
                </div>
            </div>
        </div>

        <!-- Right Column (Order Details) -->
        <div class="col-md-8">
            <div id="order-details">
                <!-- Content will change dynamically based on selected table -->
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-start">
                            <div class="mb-2"><strong>โต๊ะ:</strong> <span id="table-number">1</span></div>
                            <div class="mb-2"><strong>จำนวนคน:</strong> <span id="people-number">2</span></div>
                            <div class="mb-2"><strong>เวลา:</strong> <span id="time-remaining-right">1:59:59</span></div>
                            <div class="mb-2"><strong>พนักงาน:</strong> EM003</div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            <button class="btn btn-dark text-white mr-2">แก้ไข</button>
                            <button class="btn btn-danger">เช็คบิล</button>
                        </div>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h5>หมูสามชั้น</h5>
                        <p>จำนวน 5 ถาด</p>
                        <p class="text-danger">หมายเหตุ: ขอหมูที่เกิดในวันพระจันทร์เต็มดวง</p>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h5>หมูสามชั้น</h5>
                        <p>จำนวน 5 ถาด</p>
                        <p class="text-danger">หมายเหตุ: ขอหมูผ่า</p>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h5>กุ้ง</h5>
                        <p>จำนวน 10 ถาด</p>
                        <p class="text-danger">หมายเหตุ: -</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .table-list .table-status {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        border: 1px solid #dee2e6;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .table-list .table-status:hover {
        background-color: #e2e6ea;
    }
    .table-list .table-status.active .table-info,
    .table-list .table-status.active .people-info,
    .table-list .table-status.active .time-remaining {
        color: red;
    }
    .time-remaining {
        font-size: 1.5em;
        font-weight: bold;
    }
    .text-black {
        color: black !important;
    }
    .card {
        border-radius: 10px;
    }
    .card-body {
        padding: 20px;
    }
    .bg-white {
        background-color: #fff !important;
    }
    .btn-dark {
        background-color: #343a40;
    }
    .btn-dark.text-white {
        color: white !important;
    }
</style>

<script>
    function selectTable(tableNumber) {
        // Remove the 'active' class from all tables
        document.querySelectorAll('.selectable-table').forEach(function(table) {
            table.classList.remove('active');
        });

        // Add 'active' class to the selected table
        document.getElementById('table-' + tableNumber).classList.add('active');

        // Update the order details on the right side based on the selected table
        document.getElementById('table-number').innerText = tableNumber;
        
        // Simulating number of people and time remaining for each table as an example
        let peopleCount = {
            1: 2,
            2: 4,
            3: 3,
            4: 5,
            5: 4,
            6: 6,
            7: 2,
            8: 8
        };
        
        let timeRemaining = {
            1: "1:59:59",
            2: "0:00:00",
            3: "0:45:30",
            4: "0:00:00",
            5: "1:15:10",
            6: "0:00:00",
            7: "1:30:50",
            8: "0:00:00"
        };
        
        document.getElementById('people-number').innerText = peopleCount[tableNumber];
        document.getElementById('time-remaining-right').innerText = timeRemaining[tableNumber];
    }
</script>
@endsection

</body>
</html>