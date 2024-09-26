@extends('layouts.admin')
@section('title', 'แก้ไขเมนู')
@section('headline','แก้ไข/เพิ่มลบ/เมนู')
@section('content')
    <div class="card m-3 p-3" style="width: 18rem;">
        <img src="https://static.scientificamerican.com/sciam/cache/file/2AE14CDD-1265-470C-9B15F49024186C10_source.jpg?w=1200" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's
                content.</p>
                <div class="text-end">
                    <a href="#"><button type="button" class="btn btn-danger">แก้ไข</button></a>
                </div>
        </div>
    </div>
@endsection
