<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $primaryKey = 'kode_transaksi';
    protected $keyType = 'string';
    protected $fillable = ['kode_transaksi', 'id_anggota', 'kode_buku', 'tgl_pinjam', 'tgl_harus_kembali', 'tgl_kembali'];
    public $timestamps = false;
}
