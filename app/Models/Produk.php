<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    /** @use HasFactory<\Database\Factories\ProdukFactory> */
    use HasFactory;

    protected $fillable =
    ['produk_id', 'kategori_id', 'nama_produk', 'stok_produk', 'satuan', 'harga_produk', 'deskripsi_produk', 'gambar_produk'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    protected $table = 'produks';
}
