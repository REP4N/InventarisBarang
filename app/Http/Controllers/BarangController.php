<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function getBarang(Barang $barang)
    {
        $dataBarang = $barang->paginate(10);

        return view('admin.barang.viewBarang', compact('dataBarang'));
    }
    public function tambah(User $user)
    {
        $fetchUser = $user->get();
        return view('admin.barang.tambahForm', compact('fetchUser'));
    }
    public function edit(Barang $barang, User $user)
    {
        $fetchUser = $user->get();
        return view('admin.barang.editForm', compact('fetchUser', 'barang'));
    }
    public function saveBarang(Barang $barang, Request $barangRequest)
    {
        $data = $barangRequest->all();
        //dd($data);
        $barang->create($data);
        return redirect(route('barang.getBarang'))->with('success', 'Data barang berhasil ditambahkan');
    }
    public function deleteBarang(Kehadiran $barang)
    {
        $barang->delete();
        return back()->with(['success' => 'Data berhasil dihapus']);
    }
    public function updateBarang(Barang $barang, Request $barangRequest)
    {
        $data = $barangRequest->all();
        $barang->update($data);
        return redirect(route('barang.getBarang'))->with('success', 'Data barang berhasil diubah');
    }
}