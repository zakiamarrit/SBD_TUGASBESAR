<?php

namespace App\Http\Controllers;

use App\Models\Histori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HistoriController extends Controller
{
    public function index(Request $request)
    {
        $datas = DB::table('histori_stok_obat')
            ->selectRaw('histori_stok_obat.*,obat.nama_obat,unit_kerja.nama_unit_kerja,admin.nama_admin')
            ->leftJoin('obat', 'histori_stok_obat.id_obat', 'obat.id_obat')
            ->leftJoin('unit_kerja', 'histori_stok_obat.id_unit_kerja', 'unit_kerja.id_unit_kerja')
            ->leftJoin('admin', 'histori_stok_obat.dicatat_oleh', 'admin.id_admin')
            ->whereNull('histori_stok_obat.deleted_at');

        if (!empty($request->filter)) {
            $datas->where('obat.nama_obat', 'like', '%' . $request->filter . '%');
        }

        return view('histori.index')
            ->with('datas', $datas->get())
            ->with('filter', $request->filter);
    }

    public function create()
    {
        $obat = DB::select('select * from obat where ISNULL(deleted_at)');
        $unit_kerja = DB::select('select * from unit_kerja where ISNULL(deleted_at)');
        return view('histori.add')
            ->with('obat', $obat)
            ->with('unit_kerja', $unit_kerja);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_histori_stok_obat' => 'required',
            'id_obat' => 'required',
            'id_unit_kerja' => 'required',
            'jumlah' => 'required',
            'tgl_stok' => 'required',
        ]);

        $dicatatOleh = $request->session()->get('admin')->id_admin;

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO histori_stok_obat(id_histori_stok_obat, id_obat, id_unit_kerja, jumlah, tgl_stok, dicatat_oleh) VALUES (:id_histori_stok_obat, :id_obat, :id_unit_kerja, :jumlah, :tgl_stok, :dicatat_oleh)',
            [
                'id_histori_stok_obat' => $request->id_histori_stok_obat,
                'id_obat' => $request->id_obat,
                'id_unit_kerja' => $request->id_unit_kerja,
                'jumlah' => $request->jumlah,
                'tgl_stok' => $request->tgl_stok,
                'dicatat_oleh' => $dicatatOleh
            ]
        );

        return redirect()->route('histori.index')->with('success', 'Data Histori berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('histori_stok_obat')->where('id_histori_stok_obat', $id)->first();
        $obat = DB::select('select * from obat where ISNULL(deleted_at)');
        $unit_kerja = DB::select('select * from unit_kerja where ISNULL(deleted_at)');
        return view('histori.edit')
            ->with('data', $data)
            ->with('obat', $obat)
            ->with('unit_kerja', $unit_kerja);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_histori_stok_obat' => 'required',
            'id_obat' => 'required',
            'id_unit_kerja' => 'required',
            'jumlah' => 'required',
            'tgl_stok' => 'required',
        ]);

        $dicatatOleh = $request->session()->get('admin')->id_admin;

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE histori_stok_obat SET id_histori_stok_obat = :id_histori_stok_obat, id_obat = :id_obat, id_unit_kerja = :id_unit_kerja, jumlah = :jumlah, tgl_stok = :tgl_stok, dicatat_oleh = :dicatat_oleh WHERE id_histori_stok_obat = :id',
            [
                'id_histori_stok_obat' => $request->id_histori_stok_obat,
                'id_obat' => $request->id_obat,
                'id_unit_kerja' => $request->id_unit_kerja,
                'jumlah' => $request->jumlah,
                'tgl_stok' => $request->tgl_stok,
                'dicatat_oleh' => $dicatatOleh,
                'id' => $id
            ]
        );

        return redirect()->route('histori.index')->with('success', 'Data Histori berhasil diubah');
    }

    public function delete($id)
    {
        // Soft Deletes
        DB::update('update histori_stok_obat set deleted_at = :deleted_at where id_histori_stok_obat = :id_histori_stok_obat', [
            "deleted_at" => date("Y-m-d H:i:s"),
            'id_histori_stok_obat' => $id
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        // DB::delete('DELETE FROM obat WHERE id_obat = :id_obat', ['id_obat' => $id]);

        return redirect()->route('histori.index')->with('success', 'Data Histori berhasil dihapus');
    }
}
