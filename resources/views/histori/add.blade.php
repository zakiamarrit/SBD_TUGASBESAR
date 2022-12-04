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

        <h5 class="card-title fw-bolder mb-3">Tambah Riwayat</h5>

        <form method="post" action="{{ route('histori.store') }}">
            @csrf
            <div class="mb-3">
                <label for="id_histori_stok_obat" class="form-label">ID Histori Obat</label>
                <input type="text" class="form-control" id="id_histori_stok_obat" name="id_histori_stok_obat">
            </div>
            <div class="mb-3">
                <label for="id_obat" class="form-label">Obat</label>
                <select class="form-control" id="id_obat" name="id_obat">
                    <option>=== PILIH OBAT ===</option>
                    @foreach($obat as $obat):
                    <option value="{{$obat->id_obat}}">{{$obat->nama_obat}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="id_unit_kerja" class="form-label">Unit Kerja</label>
                <select class="form-control" id="id_unit_kerja" name="id_unit_kerja">
                    <option>=== PILIH UNIT KERJA ===</option>
                    @foreach($unit_kerja as $unit_kerja):
                    <option value="{{$unit_kerja->id_unit_kerja}}">{{$unit_kerja->nama_unit_kerja}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah">
            </div>
            <div class="mb-3">
                <label for="tgl_stok" class="form-label">Tanggal Stok</label>
                <input type="text" class="form-control" id="tgl_stok" name="tgl_stok">
            </div>
            <div class="text-center">
                <input type="submit" class="btn btn-primary" value="Tambah" />
            </div>
        </form>
    </div>
</div>

@stop