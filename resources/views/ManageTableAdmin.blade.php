@extends('layouts.layout_admin')

@push('style')
<link rel="stylesheet" href="{{ asset('css/managetableadmin.css') }}">
@endpush

@section('menu')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar โต๊ะทางซ้าย -->
        <div class="col-md-4 p-3" style="background-color: white;">
            <div class="table-list">
                @foreach ($tables as $table)
                <div class="table-status mb-3 selectable-table {{ $table->status == 1 ? 'open' : 'close' }}" id="table-{{ $table->id }}" onclick="selectTable({{ $table->id }})">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="table-info">โต๊ะ {{ $table->id }}</div>
                        <p>เวลาที่เหลือ</p>
                    </div>
                    <div class="d-flex align-items-center">
                        <div class="people-info">
                            <i class="bi bi-person-fill"></i>
                            @if($table->bill && $table->bill->count() > 0)
                                {{ $table->bill->last()->person_amount }} คน
                            @else
                                0 คน
                            @endif
                        </div>
                        <div class="time-remaining text-black" id="time-remaining-{{ $table->id }}">
                            @if($table->status == 0 && $table->bill && $table->bill->count() > 0)
                                <script>
                                    startTableCountdown('{{ $table->bill->last()->start_time }}', 'time-remaining-{{ $table->id }}');
                                </script>
                            @else
                                00:00:00
                            @endif
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Main Content แสดงรายละเอียดโต๊ะที่เลือกทางขวา -->
        <div class="col-md-8">
            @if(isset($selectedTable))
            <div id="order-details">
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-start">
                            <div class="mb-2"><strong>โต๊ะ</strong> <span id="table-number">{{ $selectedTable->id }}</span></div>
                            <div class="mb-2"><strong>จำนวนคน:</strong>
                                @if($selectedTable->bill && $selectedTable->bill->count() > 0)
                                    {{ $selectedTable->bill->last()->person_amount }} คน
                                @else
                                    0 คน
                                @endif
                            </div>
                            <div class="mb-2"><strong>เวลาที่เหลือ:</strong>
                                <span id="selected-table-countdown">
                                    @if($selectedTable->status == 0 && $selectedTable->bill && $selectedTable->bill->count() > 0)
                                        <script>
                                            startTableCountdown('{{ $selectedTable->bill->last()->start_time }}', 'selected-table-countdown');
                                        </script>
                                    @else
                                        00:00:00
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end mt-3">
                            @if($selectedTable->status == 1)
                                <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#editModal" onclick="openModal({{ $selectedTable->id }})">เปิดโต๊ะ</button>
                            @else
                                <button class="btn btn-dark text-white mr-2" data-bs-toggle="modal" data-bs-target="#editModal" onclick="openEditModal({{ $selectedTable->id }})">แก้ไข</button>
                                <button class="btn btn-danger text-white">เช็คบิล</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<!-- Modal for Editing -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">โต๊ะ <span id="table-number">{{ $selectedTable->id }}</span></h5>
        <button type="button" class="btn-close" aria-label="Close" onclick="closeModal()"></button>
      </div>
      <div class="modal-body text-center">
        <form id="openTableForm" action="{{ route('bill.create') }}" method="POST">
          @csrf
          <input type="hidden" name="tableid" id="table-id-input">
          <input type="hidden" name="empid" value="{{ $employee->id }}">

          <div class="mb-3">
            <label for="people-amount" class="form-label">จำนวนคน</label>
            <div class="input-group justify-content-center">
              <button type="button" class="btn btn-outline-secondary" onclick="updatePeopleCount(-1)">-</button>
              <input type="text" class="form-control text-center" id="people-amount" name="amount" value="1" readonly>
              <button type="button" class="btn btn-outline-secondary" onclick="updatePeopleCount(1)">+</button>
            </div>
          </div>

          <div class="mb-3">
            <label for="time-remaining" class="form-label">เวลา</label>
            <input type="text" class="form-control text-center" id="time-remaining" name="time_remaining" value="2:00:00" readonly>
          </div>

          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-success" onclick="startTimer()">เริ่มจับเวลา</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">โต๊ะ <span id="table-number">{{ $selectedTable->id }}</span></h5>
        <button type="button" class="btn-close" aria-label="Close" onclick="closeModal()"></button>
      </div>
      <div class="modal-body text-center">
      <form id="openTableForm" action="{{ route('bill.update') }}" method="POST">
            @csrf
            <input type="hidden" name="tableid" id="table-id-input">
            <input type="hidden" name="empid" value="{{ $employee->id }}">
          <div class="mb-3">
            <label for="people-amount" class="form-label">จำนวนคน</label>
            <div class="input-group justify-content-center">
              <button type="button" class="btn btn-outline-secondary" onclick="updatePeopleCount(-1)">-</button>
              <input type="text" class="form-control text-center" id="people-amount" name="amount" value="1" readonly>
              <button type="button" class="btn btn-outline-secondary" onclick="updatePeopleCount(1)">+</button>
            </div>
          </div>

          <div class="mb-3">
            <label for="time-remaining" class="form-label">เวลา</label>
            <input type="text" class="form-control text-center" id="time-remaining" name="time_remaining" readonly> <!-- แสดง countdown ที่เหลือ -->
          </div>

          <div class="modal-footer justify-content-center">
            <button type="submit" class="btn btn-success">ตกลง</button> <!-- เปลี่ยนปุ่มเป็นตกลง -->
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
    function selectTable(tableNumber) {
        // เปลี่ยน URL เพื่อให้ส่งค่า tableNumber ไปยัง URL
        window.location.href = '/managetable/' + tableNumber;
    }

    function openModal(tableId) {
        document.getElementById('table-id-input').value = tableId;
        var modal = new bootstrap.Modal(document.getElementById('editModal'));
        modal.show();
    }


    function closeModal() {
        var modalElement = document.getElementById('editModal');
        var modalInstance = bootstrap.Modal.getInstance(modalElement);
        modalInstance.hide();
    }


    function updatePeopleCount(change) {
        var peopleInput = document.getElementById('people-amount');
        var currentPeople = parseInt(peopleInput.value);
        var newPeople = currentPeople + change;
        if (newPeople >= 1 && newPeople <= 4) {
            peopleInput.value = newPeople;
        }
    }

    function openEditModal(tableId) {
        document.getElementById('table-id-input').value = tableId;

        // ดึงข้อมูลเวลาที่เหลือและแสดงใน modal
        var countdownElement = document.getElementById('time-remaining');
        @if($selectedTable->bill && $selectedTable->bill->count() > 0)
        var startTime = '{{ $selectedTable->bill->last()->start_time }}';
        var startTime = now();
        @endif

        startTableCountdown(startTime, countdownElement.id);

        var modal = new bootstrap.Modal(document.getElementById('editModal'));
        modal.show();
    }
</script>

@endsection
