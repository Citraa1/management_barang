<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {

        $barangs = Barang::all();


        return view('barang.index', compact('barangs'));
    }

    /**
     * 
     */
    public function create()
    {
        // 
        return view('barang.create');
    }

    /**
     * 
     */
    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        // Menyimpan data barang ke database
        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan.');
    }

    /**
     * 
     */
    public function show($id)
    {
        // Mengambil data barang berdasarkan ID
        $barang = Barang::findOrFail($id);


        return view('barang.show', compact('barang'));
    }

    /**
     * 
     */
    public function edit($id)
    {
        // Mengambil data barang berdasarkan ID
        $barang = Barang::findOrFail($id);


        return view('barang.edit', compact('barang'));
    }

    /**
     * 
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'jumlah' => 'required|integer',
            'harga' => 'required|numeric',
        ]);

        $barang = Barang::findOrFail($id);

        // Mengupdate data barang
        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Menghapus barang dari database.
     */
    public function destroy($id)
    {
        // Mengambil data barang berdasarkan ID
        $barang = Barang::findOrFail($id);

        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus.');
    }
}
