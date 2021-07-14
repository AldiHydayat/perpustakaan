<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'buku';
    protected $primaryKey = 'kode_buku';
    protected $keyType = 'string';
    protected $fillable = ['kode_buku', 'judul', 'kode_penerbit', 'kode_kategori', 'sinopsis', 'cover_buku', 'status', 'penulis'];
    public $timestamps = false;
}
