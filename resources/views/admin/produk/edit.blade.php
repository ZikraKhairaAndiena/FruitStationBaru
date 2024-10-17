@extends('admin.layouts.main')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Produk</h1>
  </div>

  <div class="row">
    <div class="col-6">
        <form action="/produk/{{ $produk->id }}" method="post" enctype="multipart/form-data">
        @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="produk_id" class="form-label">Produk ID</label>
                <input type="text" class="form-control @error('produk_id') is-invalid @enderror" name="produk_id" id="produk_id" value="{{ old('produk_id', $produk->produk_id) }}">
                @error('produk_id')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label">Kategori ID</label>
                <select name="kategori_id" class="form-select">
                    <option value="">Pilih kategori</option>
                    @foreach ($kategoris as $datakategori)
                    @if (old('kategori_id', $produk->kategori_id)== $datakategori->id)
                    <option value="{{ $datakategori->id }}"selected>{{ $datakategori->nama_kategori }}</option>
                    @else
                    <option value="{{ $datakategori->id }}">{{ $datakategori->nama_kategori }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk" id="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}">
                @error('nama_produk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="stok_produk" class="form-label">Stok Produk</label>
                <input type="number" class="form-control @error('stok_produk') is-invalid @enderror" name="stok_produk" id="stok_produk" value="{{ old('stok_produk', $produk->stok_produk) }}">
                @error('stok_produk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" id="satuan" value="{{ old('satuan', $produk->satuan) }}">
                @error('satuan')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="harga_produk" class="form-label">Harga Produk</label>
                <input type="number" class="form-control @error('harga_produk') is-invalid @enderror" name="harga_produk" id="harga_produk" value="{{ old('harga_produk', $produk->harga_produk) }}">
                @error('harga_produk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                <input type="text" class="form-control @error('deskripsi_produk') is-invalid @enderror" name="deskripsi_produk" id="deskripsi_produk" value="{{ old('deskripsi_produk', $produk->deskripsi_produk) }}">
                @error('deskripsi_produk')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="gambar_produk" class="form-label">Gambar Produk</label>
                <input type="file" class="form-control @error('gambar_produk') is-invalid @enderror"
                       name="gambar_produk" id="gambar_produk">
                @error('gambar_produk')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-3">
                <input type="submit" class="btn btn-primary" name="submit">
            </div>
        </form>
    </div>
</div>
@endsection
