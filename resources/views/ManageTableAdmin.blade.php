  @extends('layouts.layout_admin')
  @push('style')
      <link rel="stylesheet" href="{{ asset('css/managetableadmin.css') }}">
  @endpush
  @section('menu-active')
      <ul class="navbar-nav">
          <li class="nav-item">
              <a class="nav-link " href="{{ route('home_admin') }}">หน้าหลัก</a>
          </li>
          <li class="nav-item">
              <a class="nav-link active" href="{{ route('table_admin') }}">จัดการโต๊ะ</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('menulist') }}">รายการอาหารของลูกค้า</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="#">ข้อมูลพนักงาน</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('showstock') }}">แก้ไข เพิ่ม/ลบเมนู เช็คสต๊อค</a>
          </li>

      </ul>
  @endsection

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
                                          <span class="ms-4">{{ \Carbon\Carbon::parse($table->bill->last()->end_time)->format('H:i:s') }}</span>
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
                            <div class="mb-2"><strong>โต๊ะ</strong> <span id="table-number">{{ $selectedTable->id }}</span></div>
                            <div class="mb-2"><strong>จำนวนคน:</strong>
                                @if ($selectedTable->status==0)
                                    {{ $selectedTable->bill->last()->person_amount }} คน
                                @else
                                    0 คน
                                @endif
                            </div>
                            <div class="mb-2"><strong>หมดเวลาตอน :</strong>
                                <span id="selected-table-countdown">
                                @if ($selectedTable->status == 0 && $selectedTable->bill )
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

                                            @if ($selectedTable->bill->last()->end_time <= now())
                                            <a
                                                  href="{{ route('Orderfood', ['id' => $selectedTable->bill->last()->id]) }}">
                                                  <button class="btn btn-success text-white" style="display:none">สั่งอาหาร</button>
                                              </a>
                                            @else
                                            <a
                                                  href="{{ route('Orderfood', ['id' => $selectedTable->bill->last()->id]) }}">
                                                  <button class="btn btn-success text-white">สั่งอาหาร</button>
                                              </a>
                                            @endif

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
                        <h5 class="modal-title" id="openModalLabel">โต๊ะ <span id="table-number">{{ $table->id }}</span></h5>
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
                                <div class="wrapper">
                                    <span class="minus">-</span>
                                    <span class="num">1</span>
                                <span class="plus">+</span>
                                </div>
                                <input type="hidden" name="person_amount" id="person_amount" value="1">
                            </div>
                            </div>
                            <!-- ฟิลด์เวลาที่หมด -->
                            <div class="mb-3">  
                            <label for="time-remaining" class="form-label">เวลา</label>
                            <input type="text" class="form-control text-center" id="time-remaining" name="time_remaining" value="2:00:00" readonly>
                            </div>
                        </div>
                    <div class="modal-footer justify-content-center">
                        <button type="submit" class="btn btn-danger">เริ่มจับเวลา</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
            <!-- ฟอร์มการแก้ไข -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">โต๊ะ <span id="table-number">{{ $selectedTable->id }}</span></h5>
                <button type="button" class="btn-close" aria-label="Close" onclick="closeModal()"></button>
            </div>
            <div class="modal-body text-center">
                <form id="updateTableForm" action="{{ route('bill.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="tableid" id="table-id-input" value="{{ $selectedTable->id }}">

                    <div class="d-flex justify-content-around">
                        <div class="mb-3">
                            <label for="person_amount" class="form-label">จำนวนคน</label>
                            <div class="input-group justify-content-center">
                                <div class="wrapper">
                                    <button type="button" id="minus" onclick="decreaseMenu()">-</button>
                                    <label class="num" id="numberOfPerson">{{ $selectedTable->bill->last()->person_amount <= 0 ? 1 : $selectedTable->bill->last()->person_amount}}</label>
                                    <button type="button" id="plus" onclick="increaseMenu()">+</button>
                                </div>
                                <input type="hidden" name="person_amount" id="person_amount_update" value="{{ $selectedTable->bill->last()->person_amount}}">
                            </div>
                        </div>

                        <!-- ฟิลด์เวลาที่หมด -->
                        <div class="mb-3">
                            <label for="time-remaining" class="form-label =">เวลาที่หมด</label>
                            <input type="text" class="form-control text-center b" id="time-remaining" style="background-color: opacity;" name="time_remaining" 
                                value="{{ $selectedTable->bill->count() > 0 ? \Carbon\Carbon::parse($selectedTable->bill->last()->end_time)->format('H:i:s') : '00:00:00' }}" readonly>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button onclick="formSubmit()" type="button" class="btn btn-danger">ตกลง</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





  <script>
        function formSubmit(){
            let numberOfPerson =document.getElementById("numberOfPerson")

            document.getElementById("person_amount_update").value =parseInt(numberOfPerson.textContent);

            const form =document.getElementById("updateTableForm");
            if(form){
                form.submit();
            }else{
                alert("Kuy")    
            }
            
        }

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

        const plus = document.querySelector(".plus"),
          minus = document.querySelector(".minus"),
          num = document.querySelector(".num"),
          personAmountInput = document.getElementById("person_amount");
          let a = 1;

        plus.addEventListener("click", ()=>{
            if(a<4){a++;
            num.innerText = a;
            personAmountInput.value = a;}
        });

        minus.addEventListener("click", ()=>{
            if(a>1){
            a--;
            num.innerText = a;
            personAmountInput.value = a;}
        });

        function increaseMenu(){
            let numberOfPerson =document.getElementById("numberOfPerson").textContent;
            let intNumberOfPerson = parseInt(numberOfPerson) + 1;
            if(intNumberOfPerson>4){
                intNumberOfPerson = 4;
            }
            document.getElementById("numberOfPerson").textContent =intNumberOfPerson
            document.getElementById("person_amount").value = intNumberOfPerson;
        }

        function decreaseMenu(){
            let numberOfPerson =document.getElementById("numberOfPerson").textContent;
            let intNumberOfPerson = parseInt(numberOfPerson) - 1;
            if(intNumberOfPerson < 0){
                intNumberOfPerson = 0;
            }
            document.getElementById("numberOfPerson").textContent =intNumberOfPerson
            document.getElementById("person_amount").value = intNumberOfPerson;
        }

  </script>

      @endsection
