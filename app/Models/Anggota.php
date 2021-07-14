<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    protected $table = 'anggota';
    protected $primaryKey = 'kode_anggota';
    protected $keyType = 'string';
    protected $fillable = ['kode_anggota', 'nama_anggota', 'almt_anggota', 'tlp_anggota', 'email_anggota'];
    public $timestamps = false;
}
