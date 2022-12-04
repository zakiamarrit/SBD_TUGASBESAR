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

        <form method="post" action="{{ route('obat.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_obat" class="form-label">ID Obat</label>
                <input type="text" class="form-control" id="id_obat" name="id_obat">
            </div>
            <div class="mb-3">
                <label for="id_tipe_obat" class="form-label">ID Tipe Obat</label>
                <input type="text" class="form-control" id="id_tipe_obat" name="id_tipe_obat">
            </div>
            <div class="mb-3">
                <label for="nama_obat" class="form-label">Nama Obat</label>
                <input type="text" class="form-control" id="nama_obat" name="nama_obat">
            </div>
            <div class="mb-3">
                <label for="tipe_obat" class="form-label">Tipe Obat</label>
                <input type="text" class="form-control" id="tipe_obat" name="tipe_obat">
            </div>
            <div class="mb-3">
                <label for="tgl_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                <input type="text" class="form-control" id="tgl_kadaluarsa" name="tgl_kadaluarsa">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>

@stop