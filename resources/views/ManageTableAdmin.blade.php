  @extends('layouts.layout_admin')
  @push('style')
      <link rel="stylesheet" href="{{ asset('css/managetableadmin.css') }}">
  @endpush

  @push('style')
      <link rel="stylesheet" href="{{ asset('css/managetableadmin.css') }}">
  @endpush

  @section('fixcon')
      <div class="container-fluid">
      @endsection
      @section('menu')
          <div class="container">
              <div class="row">
                  <!-- Sidebar โต๊ะทางซ้าย -->
                  <div class="col-md-4 p-3" style="background-color: white;">
                      <div class="table-list">
                          @foreach ($tables as $table)
                              <div class="table-status mb-3 selectable-table {{ $table->status == 1 ? 'open' : 'close' }}"
                                  id="table-{{ $table->id }}" onclick="selectTable({{ $table->id }})">
                                  <div class="d-flex justify-content-between align-items-center">
                                      <div class="table-info">โต๊ะ {{ $table->id }}</div>
                                      <p class="mb-1 mt-2 ms-5">หมดเวลาตอน</p>
                                  </div>

                                  <div class="d-flex align-items-center">
                                      <div class="people-info">
                                          <i class="bi bi-person-fill"></i>
                                          @if ($table->bill->where('status', 0)->count() > 0)
                                              {{ $table->bill->last()->person_amount }} คน
                                          @else
                                              0 คน
                                          @endif
                                      </div>
                                      <div class="time-remaining text-black" id="time-remaining-{{ $table->id }}">
                                          @if ($table->status == 0 && $table->bill && $table->bill->count() > 0)
                                              <span
                                                  class="ms-4">{{ \Carbon\Carbon::parse($table->bill->last()->end_time)->format('H:i:s') }}</span>
                                          @else
                                              <span class="ms-3">00:00:00</span>
                                          @endif
                                      </div>
                                  </div>
                              </div>
                          @endforeach
                      </div>
                  </div>

                  <!-- Main Content แสดงรายละเอียดโต๊ะที่เลือกทางขวา -->
                  <div class="col-md-8 mt-3">
                      @if (isset($selectedTable))
                          <div id="order-details">
                              <div class="card mb-3">
                                  <div class="card-body">
                                      <div class="d-flex flex-column align-items-start">
                                          <div class="mb-2"><strong>โต๊ะ</strong> <span
                                                  id="table-number">{{ $selectedTable->id }}</span></div>
                                          <div class="mb-2"><strong>จำนวนคน:</strong>
                                              @if ($selectedTable->status == 0 && $selectedTable->bill->count() > 0)
                                                  {{ $selectedTable->bill->last()->person_amount }} คน
                                              @else
                                                  0 คน
                                              @endif
                                          </div>
                                          <div class="mb-2"><strong>หมดเวลาที่ :</strong>
                                              <span id="selected-table-countdown">
                                                  @if ($selectedTable->status == 0 && $selectedTable->bill)
                                                      {{ \Carbon\Carbon::parse($selectedTable->bill->last()->end_time)->format('H:i:s') }}
                                                  @else
                                                      00:00:00
                                                  @endif
                                              </span>
                                          </div>
                                      </div>
                                      <div class="d-flex justify-content-end mt-3">
                                          @if ($selectedTable->status == 1)
                                              <button class="btn btn-success" data-bs-toggle="modal"
                                                  data-bs-target="# OpenTableModal"
                                                  onclick="openTableModal({{ $selectedTable->id }})">เปิดโต๊ะ</button>
                                          @else
                                              <button class="btn btn-dark text-white mr-2 me-2" data-bs-toggle="modal"
                                                  data-bs-target="#openEditModal"
                                                  onclick="openEditModal({{ $selectedTable->id }})">แก้ไข</button>
                                              <a href="{{ url('Billadmin', ['id' => $selectedTable->bill->last()->id]) }}">
                                                  <button class="btn btn-danger text-white me-2">เช็คบิล</button>
                                              </a>
                                              <a
                                                  href="{{ route('Orderfood', ['id' => $selectedTable->bill->last()->id]) }}">
                                                  <button class="btn btn-success text-white">สั่งอาหาร</button>
                                              </a>
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
          <div class="modal fade" id="OpenTableModal" tabindex="-1" aria-labelledby="openModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="openModalLabel">โต๊ะ <span
                                  id="table-number">{{ $table->id }}</span></h5>
                          <button type="button" class="btn-close" aria-label="Close" onclick="closeModal()"></button>
                      </div>
                      <div class="modal-body text-center">
                          <form id="openTableForm" action="{{ route('bill.create') }}" method="POST">
                              @csrf
                              <input type="hidden" name="tableid" id="table-id-input" value="{{ $table->id }}">

                              <div class="d-flex justify-content-around">
                                  <div class="mb-3">
                                      <label for="person_amount" class="form-label">จำนวนคน</label>
                                      <div class="input-group justify-content-center">
                                          <button type="button" class="btn btn-outline-secondary"
                                              onclick="updatePeopleCount(-1)">-</button>
                                          <input type="text" class="form-control text-center" id="person_amount"
                                              name="amount" value="1" readonly>
                                          <button type="button" class="btn btn-outline-secondary"
                                              onclick="updatePeopleCount(1)">+</button>
                                      </div>
                                  </div>

                                  <!-- จัดวางข้อมูลเวลาที่เหลือ -->
                                  <div class="mb-3">
                                      <label for="time-remaining" class="form-label">เวลา</label>
                                      <input type="text" class="form-control text-center" id="time-remaining"
                                          name="time_remaining" value="2:00:00" readonly>
                                  </div>
                              </div>

                              <!-- ปุ่มเริ่มจับเวลา -->
                              <div class="modal-footer justify-content-center">
                                  <button type="submit" class="btn btn-danger">เริ่มจับเวลา</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>


          <!-- ฟอร์มการแก้ไขเวลาที่หมด -->
          <!-- ฟอร์มการแก้ไขเวลาที่หมด -->
          <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h5 class="modal-title" id="editModalLabel">โต๊ะ <span
                                  id="table-number">{{ $selectedTable->id }}</span></h5>
                          <button type="button" class="btn-close" aria-label="Close" onclick="closeModal()"></button>
                      </div>
                      <div class="modal-body text-center">
                          <form id="openTableForm" action="{{ route('bill.update') }}" method="POST">
                              @csrf
                              <input type="hidden" name="tableid" id="table-id-input">

                              <div class="d-flex justify-content-around">
                                  <div class="mb-3">
                                      <label for="person_amount" class="form-label">จำนวนคน</label>
                                      <div class="input-group justify-content-center">
                                          <button type="button" class="btn btn-outline-secondary"
                                              onclick="updatePeopleCount(-1)">-</button>
                                          <input type="text" class="form-control text-center" id="person_amount"
                                              name="amount" value="{{ $selectedTable->bill->last()->person_amount }}">
                                          <button type="button" class="btn btn-outline-secondary"
                                              onclick="updatePeopleCount(1)">+</button>
                                      </div>
                                  </div>


                                  <!-- ฟิลด์เวลาที่หมด -->
                                  <div class="mb-3">
                                      <label for="time-remaining" class="form-label">เวลาที่หมด</label>
                                      <input type="text" class="form-control text-center" id="time-remaining"
                                          name="time_remaining"
                                          value="{{ $selectedTable->bill->count() > 0 ? \Carbon\Carbon::parse($selectedTable->bill->last()->end_time)->format('H:i:s') : '00:00:00' }}"
                                          readonly>
                                  </div>
                              </div>

                              <div class="modal-footer justify-content-center">
                                  <button type="submit" class="btn btn-danger">ตกลง</button>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>





          <script>
              function selectTable(tableNumber) {

                  window.location.href = '/managetable/' + tableNumber;
              }

              function checkbill() {
                  window.location.href = 'Billadmin';
              }

              function openTableModal(tableId) {
                  document.getElementById('table-id-input').value = tableId;
                  var modal = new bootstrap.Modal(document.getElementById('OpenTableModal'));
                  modal.show();
              }

              function openEditModal(tableId) {
                  document.getElementById('table-id-input').value = tableId;
                  var modal = new bootstrap.Modal(document.getElementById('editModal'));
                  modal.show();
              }

              function closeModal() {
                  var modalElement = document.getElementById('editModal');
                  var modalInstance = bootstrap.Modal.getInstance(modalElement);
                  modalInstance.hide();
              }

              function updatePeopleCount(person_amount) {
                  function updatePeopleCount(person_amount) {
                      var peopleInput = document.getElementById('person_amount');
                      var currentPeople = parseInt(peopleInput.value);
                      var newPeople = currentPeople + change;
                      if (newPeople >= 1 && newPeople <= 4) {
                          peopleInput.value = newPeople;
                      }
                  }
              }
          </script>

      @endsection
