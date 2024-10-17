@extends('admin.layouts.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2 text-primary">Detail Data Produk</h1>
</div>

<div class="row">
    <div class="col-12 col-md-8 col-lg-6 mx-auto">

        <div class="card shadow-sm border-primary">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Informasi Produk</h5>
            </div>
            <div class="card-body bg-light">

                <div class="mb-3">
                    <label for="produk_id" class="form-label fw-bold text-primary">Produk ID</label>
                    <p class="form-control-plaintext border p-2 rounded bg-white">{{ $produk->produk_id }}</p>
                </div>

                <div class="mb-3">
                    <label for="kategori_id" class="form-label fw-bold text-primary">Kategori ID</label>
                    <p class="form-control-plaintext border p-2 rounded bg-white">{{ $produk->kategori_id }}</p>
                </div>

                <div class="mb-3">
                    <label for="nama_produk" class="form-label fw-bold text-primary">Nama Produk</label>
                    <p class="form-control-plaintext border p-2 rounded bg-white">{{ $produk->nama_produk }}</p>
                </div>

                <div class="mb-3">
                    <label for="stok_produk" class="form-label fw-bold text-primary">Stok Produk</label>
                    <p class="form-control-plaintext border p-2 rounded bg-white">{{ $produk->stok_produk }}</p>
                </div>

                <div class="mb-3">
                    <label for="satuan" class="form-label fw-bold text-primary">satuan</label>
                    <p class="form-control-plaintext border p-2 rounded bg-white">{{ $produk->satuan}}</p>
                </div>
                <div class="mb-3">
                    <label for="deskripsi_produk" class="form-label fw-bold text-primary">Deskripsi Produk</label>
                    <p class="form-control-plaintext border p-2 rounded bg-white">{{ $produk->deskripsi_produk }}</p>
                </div>
                <div class="mb-3">
                    <label for="gambar_produk" class="form-label fw-bold text-primary">Gambar Produk</label>
                    <p class="form-control-plaintext border p-2 rounded bg-white">{{ $produk->gambar_produk }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
<a href="/produk/" class="btn btn-success btn-sm">Kembali</a>
@endsection
