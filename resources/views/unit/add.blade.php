@extends('layout')

@section('content')

@if($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error)

        <li>{{ $error }}</li>

        @endforeach
    </ul>
</div>
@endif

<div class="card mt-4">
    <div class="card-body">

        <h5 class="card-title fw-bolder mb-3">Tambah Obat</h5>

        <form method="post" action="{{ route('unit.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_unit_kerja" class="form-label">ID Unit Kerja</label>
                <input type="text" class="form-control" id="id_unit_kerja" name="id_unit_kerja">
            </div>
            <div class="mb-3">
                <label for="nama_unit_kerja" class="form-label">Nama Unit Kerja</label>
                <input type="text" class="form-control" id="nama_unit_kerja" name="nama_unit_kerja">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>

@stop