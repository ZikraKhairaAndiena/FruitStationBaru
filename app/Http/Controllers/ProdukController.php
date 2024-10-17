<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produks=Produk::latest()->paginate(10);
        return view('admin.produk.index',['produks'=>$produks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.produk.create', ['kategoris'=>$kategoris]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate
        ([
            'produk_id' => 'required|unique:produks',
            'kategori_id' => 'required|exists:kategoris,id',
            'nama_produk' => 'required|string|max:255',
            'stok_produk' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',
            'harga_produk' => 'required|numeric|min:0',
            'deskripsi_produk' => 'nullable|string',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Handling file upload
        if ($request->hasFile('gambar_produk')) {
            $validated['gambar_produk'] = $request->file('gambar_produk')->store('img/produk', 'public');
        }

        Produk::create($validated);
        return redirect('/produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.show', compact('produk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategoris = Kategori::all();
        $produk = Produk::find($id);
        return view('admin.produk.edit', compact('kategoris','produk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'produk_id' => 'required|unique:produks,produk_id,' . $id,
            'kategori_id' => 'required|exists:kategoris,id',
            'nama_produk' => 'required|string|max:255',
            'stok_produk' => 'required|integer|min:0',
            'satuan' => 'required|string|max:50',
            'harga_produk' => 'required|numeric|min:0',
            'deskripsi_produk' => 'nullable|string',
            'gambar_produk' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Hanya jika ada gambar yang diupload, simpan gambar baru
        // if ($request->hasFile('gambar_produk')) {
        //     $validated['gambar_produk'] = $request->file('gambar_produk')->store('img', 'public'); // Simpan gambar ke folder public/img
        // }

        if ($request->hasFile('gambar_produk')) {
            $validated['gambar_produk'] = $request->file('gambar_produk')->store('produk', 'public');
        }


        Produk::where('id', $id)->update($validated);

        return redirect('produk')->with('pesan', 'Data Berhasil di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Produk::destroy($id);
        return redirect('produk')->with('pesan','Data berhasil dihapus');
    }
}
