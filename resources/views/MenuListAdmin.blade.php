@extends('layouts.layout_admin')
@push('style')
<link rel="stylesheet" href="{{ asset('css/menulist.css') }}">
@endpush


@section('fixcon')
  <div class="container mt-4 mb-4">
@endsection

@section('menu')
<h2 class="text-center">รายการอาหารของลูกค้า</h2>
@if (count($listorders) == 0)
    <p class="text-center align-item-center block mt-4 text-muted" style="font-size:larger; font-weight:100;">ยังไม่มีออเดอร์ของลูกค้าเข้ามา</p>
@else
    @foreach ($listorders as $created_at => $orders)
            <form action="{{ route('update.status') }}" method="POST">
                @csrf
                <div class="block">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="table-header">
                                <h4>โต๊ะ {{$orders->first()->bill->table_id}}</h4>
                            </div>
                        </div>

                        <div class="col-md-9">
                            @foreach ($orders as $order)
                            <div class="row table-section">
                                <div class="col-md-8">
                                    <h5>{{$order->menu->name}}</h5>
                                    <p>จำนวน {{$order->amount}} ถาด</p>
                                </div>

                                @if($orders->count() > 1)
                                <div class="col-md-4 d-flex align-items-center justify-content-center checkbox-container">
                                    <input type="checkbox" name="order_ids[]" value="{{ $order->id }}">
                                </div>
                                @else
                                <input type="hidden" name="order_ids[]" value="{{ $order->id }}">
                                @endif
                            </div>

                            @if (!$loop->last)
                            <div class="col-md-12">
                                <hr class="menu-divider">
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12 text-end mt-3">
                        <button type="submit" class="btn btn-success">ยืนยัน</button>
                    </div>
                </div>
            </form>
    @endforeach
@endif
</body>
@endsection
</html>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.btn-success').forEach(function(button) {
        button.addEventListener('click', function(event) {
            var group = this.closest('.block');
            var checkboxes = group.querySelectorAll('input[type="checkbox"]');
            var allChecked = true;

            checkboxes.forEach(function(checkbox) {
                if (!checkbox.checked) {
                    allChecked = false;
                }
            });

            if (!allChecked) {
                event.preventDefault();
                alert('กรุณาเลือกเมนูให้ครบทุกอันก่อนยืนยัน');
            }
        });
    });
});
</script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script> --}}
</body>
