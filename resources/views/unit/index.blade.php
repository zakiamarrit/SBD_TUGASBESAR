@extends('layout')

@section('content')

<form method="get" action="{{ route('unit.index') }}" class="form-inline my-2 my-lg-0">
    @csrf
    <div class="row mt-3">
        <div class="col-sm-6">
            <input class="form-control mr-sm-2" type="text" name="filter" placeholder="Cari Unit Kerja" aria-label="Search" value="{{$filter}}">
        </div>
        <div class="col-sm-6">
            <button class="btn btn-outline-success" type="submit">Cari</button>
        </div>
    </div>
</form>

<h1 class="mt-5">Data Unit Kerja</h1>

<a href="{{ route('unit.create') }}" type="button" class="btn btn-info rounded-3">Tambah Unit Kerja</a>

@if($message = Session::get('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ $message }}
</div>
@endif

<table class="table table-hover mt-2">
    <thead>
        <tr>
            <th>ID Unit Kerja</th>
            <th>Nama Unit Kerja</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datas as $data)
        <tr>
            <td>{{ $data->id_unit_kerja }}</td>
            <td>{{ $data->nama_unit_kerja }}</td>
            <td>
                <a href="{{ route('unit.edit', $data->id_unit_kerja) }}" type="button" class="btn btn-warning rounded-3">Ubah</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusModal{{ $data->id_unit_kerja }}">
                    Hapus
                </button>

                <!-- Modal -->
                <div class="modal fade" id="hapusModal{{ $data->id_unit_kerja }}" tabindex="-1" aria-labelledby="hapusModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="hapusModalLabel">Konfirmasi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form method="POST" action="{{ route('unit.delete', $data->id_unit_kerja) }}">
                                @csrf
                                <div class="modal-body">
                                    Apakah anda yakin ingin menghapus data ini?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@stop