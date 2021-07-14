<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    use HasFactory;

    protected $table = 'penerbit';
    protected $primaryKey = 'kode_penerbit';
    protected $keyType = 'string';
    protected $fillable = ['kode_penerbit', 'nama_penerbit', 'almt_penerbit', 'kontak'];
    public $timestamps = false;
}
