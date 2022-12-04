@extends('layout')

@section('content')

<br>

<h1 class="mt-4">SELAMAT DATANG PADA DATABASE FARMASI ZAKIA MARRIT</h1>

<div class="card mb-2">
    <div class="p-3 mb-2 bg-warning text-dark">Join Table</div>
    <table class="table table-hover mt-2">
        <thead>
        <tr>
            <th>ID Histori Obat</th>
            <th>Nama Obat</th>
            <th>Tipe Obat</th>
            <th>ID Obat</th>
            <th>ID Unit Kerja</th>
            <th>Tanggal Stok</th>
            <th>Tanggal Kadaluarsa</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($datas4 as $data)
                <tr>
                    <td>{{ $data->id_histori_stok_obat}}</td>
                    <td>{{ $data->nama_obat }}</td>
                    <td>{{ $data->tipe_obat }}</td>
                    <td>{{ $data->id_obat }}</td>
                    <td>{{ $data->id_unit_kerja}}</td>
                    <td>{{ $data->tgl_stok }}</td>
                    <td>{{ $data->tgl_kadaluarsa }}</td>
                </tr>
            @endforeach
    
        </tbody>
    </table>
    
</div>

{{-- <div class="card mb-2">
    <div class="p-3 mb-2 bg-info text-dark">Riwayat</div>
    <table class="table table-hover mt-2">
    <thead>
      <tr>
        <th>ID Histori Stok Obat</th>
        <th>ID Obat</th>
        <th>ID Unit Kerja</th>
        <th>Jumlah</th>
        <th>Tanggal Stok</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($datas2 as $data)
            <tr>
                <td>{{ $data->id_histori_stok_obat }}</td>
                <td>{{ $data->id_obat }}</td>
                <td>{{ $data->id_unit_kerja }}</td>
                <td>{{ $data->jumlah }}</td>
                <td>{{ $data->tgl_stok }}</td>
            </tr>
        @endforeach

    </tbody>
    </table>
</div>

<div class="card mb-2">
    <div class="p-3 mb-2 bg-info text-dark">Admin</div>
    <table class="table table-hover mt-2">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Username</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->id_admin }}</td>
                    <td>{{ $data->nama_admin }}</td>
                    <td>{{ $data->username }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

<div class="card mb-2">
    <div class="p-3 mb-2 bg-info text-dark">Obat</div>
    <table class="table table-hover mt-2">
        <thead>
        <tr>
            <th>ID Obat</th>
            <th>Nama Obat</th>
            <th>Tipe Obat</th>
            <th>Tanggal Kadaluarsa</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($datas3 as $data)
                <tr>
                    <td>{{ $data->id_obat }}</td>
                    <td>{{ $data->nama_obat }}</td>
                    <td>{{ $data->tipe_obat }}</td>
                    <td>{{ $data->tgl_kadaluarsa }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div> --}}




@endsection