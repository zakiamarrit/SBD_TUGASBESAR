<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        $datas = DB::select('select * from unit_kerja where ISNULL(deleted_at)');
        if (!empty($request->filter)) {
            $datas =   DB::table('unit_kerja')->where('nama_unit_kerja', 'like', '%' . $request->filter . '%')
                ->whereNull('deleted_at')
                ->get();
        }

        return view('unit.index')
            ->with('datas', $datas)
            ->with('filter', $request->filter);
    }

    public function create()
    {
        return view('unit.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_unit_kerja' => 'required',
            'nama_unit_kerja' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO unit_kerja(id_unit_kerja, nama_unit_kerja) VALUES (:id_unit_kerja, :nama_unit_kerja)',
            [
                'id_unit_kerja' => $request->id_unit_kerja,
                'nama_unit_kerja' => $request->nama_unit_kerja
            ]
        );

        return redirect()->route('unit.index')->with('success', 'Data Unit Kerja berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('unit_kerja')->where('id_unit_kerja', $id)->first();

        return view('unit.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_unit_kerja' => 'required',
            'nama_unit_kerja' => 'required'
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE unit_kerja SET id_unit_kerja = :id_unit_kerja, nama_unit_kerja = :nama_unit_kerja WHERE id_unit_kerja = :id',
            [
                'id_unit_kerja' => $request->id_unit_kerja,
                'nama_unit_kerja' => $request->nama_unit_kerja,
                'id' => $id
            ]
        );

        return redirect()->route('unit.index')->with('success', 'Data Unit Kerja berhasil diubah');
    }

    public function delete($id)
    {
        // Soft Deletes
        DB::update('update unit_kerja set deleted_at = :deleted_at where id_unit_kerja = :id_unit_kerja', [
            "deleleted_at" => date("Y-m-d H:i:s"),
            'id_unit_kerja' => $id
        ]);
        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        // DB::delete('DELETE FROM obat WHERE id_obat = :id_obat', ['id_obat' => $id]);

        return redirect()->route('unit.index')->with('success', 'Data Unit Kerja berhasil dihapus');
    }
}
