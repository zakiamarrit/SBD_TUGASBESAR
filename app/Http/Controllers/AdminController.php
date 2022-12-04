<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        // dd($request->all());
        $datas = DB::select('select * from admin where ISNULL(deleted_at)');
        if (!empty($request->filter)) {
            $datas =   DB::table('admin')->where('nama_admin', 'like', '%' . $request->filter . '%')
                ->whereNull('deleted_at')
                ->get();
        }


        return view('admin.index')
            ->with('datas', $datas)
            ->with('filter', $request->filter);
    }

    public function create()
    {
        return view('admin.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_admin' => 'required',
            'nama_admin' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::insert(
            'INSERT INTO admin(id_admin, nama_admin, username, password) VALUES (:id_admin, :nama_admin, :username, :password)',
            [
                'id_admin' => $request->id_admin,
                'nama_admin' => $request->nama_admin,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]
        );

        return redirect()->route('admin.index')->with('success', 'Data Admin berhasil disimpan');
    }

    public function edit($id)
    {
        $data = DB::table('admin')->where('id_admin', $id)->first();

        return view('admin.edit')->with('data', $data);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'id_admin' => 'required',
            'nama_admin' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        // Menggunakan Query Builder Laravel dan Named Bindings untuk valuesnya
        DB::update(
            'UPDATE admin SET id_admin = :id_admin, nama_admin = :nama_admin, username = :username, password = :password WHERE id_admin = :id',
            [
                'id' => $id,
                'id_admin' => $request->id_admin,
                'nama_admin' => $request->nama_admin,
                'username' => $request->username,
                'password' => Hash::make($request->password),
            ]
        );

        return redirect()->route('admin.index')->with('success', 'Data Admin berhasil diubah');
    }

    public function delete($id)
    {
        // Soft Deletes
        DB::update('update admin set deleted_at = :deleted_at where id_admin = :id_admin', [
            "deleted_at" => date("Y-m-d H:i:s"),
            'id_admin' => $id
        ]);
        // DB::delete('DELETE FROM admin WHERE id_admin = :id_admin', ['id_admin' => $id]);

        return redirect()->route('admin.index')->with('success', 'Data Admin berhasil dihapus');
    }
}
