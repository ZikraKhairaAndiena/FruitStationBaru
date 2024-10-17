@extends('admin.layouts.main')
@section('title')
@section('navMhs','active')

@section('content')
<h1>Daftar Produk Fruit Station</h1>
@if(session('pesan'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
   {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<a href="/produk/create" class="btn btn-primary mb-2">Tambah Produk</a>
{{-- <a href="/cetak-pdf" class="btn btn-success mb-2" target="_blank">Cetak-Pdf</a> --}}
<table class="table table-bordered">
    <tr>
        <th>No</th>
            <th>Produk ID</th>
            <th>kategori ID</th>
            <th>Nama Produk</th>
            <th>Stok Produk</th>
            <th>Satuan</th>
            <th>Harga Produk</th>
            <th>Deskripsi Produk</th>
            <th>Gambar Produk</th>
            <th>Aksi</th>
    </tr>
    @foreach ($produks as $produk)
    <tr>
        <td>{{ $loop->index + 1 }}</td>
        {{-- <td>{{ $mahasiswa->firstItem()+$loop->index }} </td> --}}
        <td>{{ $produk-> produk_id }}</td>
        <td>{{ $produk-> kategori_id}}</td>
        <td>{{ $produk-> nama_produk }}</td>
        <td>{{ $produk-> stok_produk }}</td>
        <td>{{ $produk-> satuan }}</td>
        <td>{{ $produk-> harga_produk}}</td>
        <td>{{ $produk-> deskripsi_produk }}</td>
        {{-- <td><img src="<?php echo $produk->gambar_produk; ?>" alt="Nama Produk"></td> --}}
        <td>
            @if($produk->gambar_produk)
                <img src="{{ asset('img/' . $produk->gambar_produk) }}" alt="{{ $produk->nama_produk }}" style="width:100px;">
                {{-- <p>Image Path: {{ asset('img/' . $produk->gambar_produk) }}</p> <!-- Debug output --> --}}
            @else
                <p>No Image Available</p>
            @endif
        </td>
        <td class="text-nowrap">
            <a href="/produk/{{ $produk->id }}" title="Lihat Detail" class="btn btn-success btn-sm"><i class="bi bi-eye"></i></a>
            <a href="/produk/{{ $produk->id }}/edit" title="Edit Data" class="btn btn-warning btn-sm"><i class="bi bi-pencil"></i></a>
            <form action="/produk/{{ $produk->id }}" method="post" class="d-inline">
                @method('DELETE')
                @csrf
            <button title="Hapus Data" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ini?')"><i class="bi bi-trash"></i></button></a>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $produks->links() }}
@endsection

