<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Penerbit;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Bus;
use Illuminate\Support\Facades\DB;
use PhpParser\Builder\Trait_;

class OperatorController extends Controller
{
    public function anggota(Request $request)
    {
        if($request->query('keyword'))
        {
            $keyword = $request->query('keyword');
            $anggota = DB::table('anggota')
                    ->where('kode_anggota', 'like', '%' . $keyword . '%')
                    ->orWhere('nama_anggota', 'like', '%' . $keyword . '%')
                    ->orWhere('email_anggota', 'like', '%' . $keyword . '%')
                    ->orWhere('almt_anggota', 'like', '%' . $keyword . '%')
                    ->get();
            return view('operator/anggota', compact('anggota'));
        }
        else
        {
            $anggota = Anggota::all();
            return view('operator/anggota', compact('anggota'));
        }
    }

    public function storeAnggota(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:anggota,kode_anggota',
            'nama' => 'required|string',
            'email' => 'required|email:rfc,dns|unique:anggota,email_anggota',
            'alamat' => 'required',
            'telp' => 'required|numeric'
        ]);

        Anggota::create([
            'kode_anggota' => $request->input('kode'),
            'nama_anggota' => $request->input('nama'),
            'email_anggota' => $request->input('email'),
            'almt_anggota' => $request->input('alamat'),
            'tlp_anggota' => $request->input('telp')
        ]);

        return redirect()->back();
    }

    public function putAnggota(Anggota $anggota)
    {
        return view('operator/editanggota', compact('anggota'));
    }

    public function updateAnggota(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'alamat' => 'required',
            'telp' => 'required|numeric'
        ]);

        DB::table('anggota')
        ->where('kode_anggota', $request->input('kode'))
        ->update([
            'nama_anggota' => $request->input('nama'),
            'email_anggota' => $request->input('email'),
            'almt_anggota' => $request->input('alamat'),
            'tlp_anggota' => $request->input('telp')
        ]);

        return redirect()->route('operator.anggota');
    }

    public function penerbit(Request $request)
    {
        if($request->query('keyword'))
        {
            $keyword = $request->query('keyword');
            $penerbit = DB::table('penerbit')
            ->where('kode_penerbit', 'like', '%' . $keyword . '%')
            ->orWhere('nama_penerbit', 'like', '%' . $keyword . '%')
            ->orWhere('almt_penerbit', 'like', '%' . $keyword . '%')
            ->orWhere('kontak', 'like', '%' . $keyword . '%')
            ->get();

            return view('operator/penerbit', compact('penerbit'));
        }
        $penerbit = Penerbit::all();
        return view('operator/penerbit', compact('penerbit'));
    }

    public function storePenerbit(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:penerbit,kode_penerbit',
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required|numeric'
        ]);

        Penerbit::create([
            'kode_penerbit' => $request->input('kode'),
            'nama_penerbit' => $request->input('nama'),
            'almt_penerbit' => $request->input('alamat'),
            'kontak' => $request->input('kontak')
        ]);

        return redirect()->route('operator.penerbit');
    }

    public function putPenerbit(Penerbit $penerbit)
    {
        return view('operator/editpenerbit', compact('penerbit'));
    }

    public function updatePenerbit(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kontak' => 'required|numeric'
        ]);

        DB::table('penerbit')
        ->where('kode_penerbit', $request->input('kode'))
        ->update([
            'nama_penerbit' => $request->input('nama'),
            'almt_penerbit' => $request->input('alamat'),
            'kontak' => $request->input('kontak')
        ]);

        return redirect()->route('operator.penerbit');
    }

    public function kategori(Request $request)
    {
        if($request->query('keyword'))
        {
            $keyword = $request->query('keyword');
            $kategori = Kategori::where('kode_kategori', 'like', '%' . $keyword . '%')
                        ->orWhere('nama_kategori', 'like', '%' . $keyword . '%')
                        ->get();
            return view('operator/kategori', compact('kategori'));
        }
        $kategori = Kategori::all();
        return view('operator/kategori', compact('kategori'));
    }

    public function storeKategori(Request $request)
    {
        $request->validate([
            'kode' => 'required|unique:kategori,kode_kategori',
            'nama' => 'required'
        ]);

        Kategori::create([
            'kode_kategori' => $request->input('kode'),
            'nama_kategori' => $request->input('nama')
        ]);

        return redirect()->route('operator.kategori');
    }

    public function putKategori(Kategori $kategori)
    {
        return view('operator/editkategori', compact('kategori'));
    }

    public function updateKategori(Request $request)
    {
        $request->validate([
            'nama' => 'required'
        ]);

        DB::table('kategori')
        ->where('kode_kategori', $request->input('kode'))
        ->update(['nama_kategori' => $request->input('nama')]);

        return redirect()->route('operator.kategori');
    }

    public function buku(Request $request)
    {        
        if($request->query('keyword'))
        {
            $keyword = $request->query('keyword');
            $buku = Buku::join('penerbit', 'buku.kode_penerbit', '=', 'penerbit.kode_penerbit')
                ->join('kategori', 'buku.kode_kategori', '=', 'kategori.kode_kategori')
                ->select('kode_buku', 'judul', 'penerbit.nama_penerbit', 'kategori.nama_kategori', 'sinopsis', 'status', 'penulis')
                ->where('kode_buku', 'like', '%' . $keyword . '%')
                ->orWhere('judul', 'like', '%' . $keyword . '%')
                ->orWhere('penerbit.nama_penerbit', 'like', '%' . $keyword . '%')
                ->orWhere('kategori.nama_kategori', 'like', '%' . $keyword . '%')
                ->orWhere('status', 'like', '%' . $keyword . '%')
                ->orWhere('penulis', 'like', '%' . $keyword . '%')
                ->get();

                $penerbit = Penerbit::all();
            $kategori = Kategori::all();

            return view('operator.buku', $data = [
                'buku' => $buku,
                'penerbit' => $penerbit,
                'kategori' => $kategori
            ]);
        }
        $buku = Buku::join('penerbit', 'buku.kode_penerbit', '=', 'penerbit.kode_penerbit')
                ->join('kategori', 'buku.kode_kategori', '=', 'kategori.kode_kategori')
                ->select('kode_buku', 'judul', 'penerbit.nama_penerbit', 'kategori.nama_kategori', 'sinopsis', 'status', 'penulis')
                ->get();

        $penerbit = Penerbit::all();
        $kategori = Kategori::all();

        return view('operator.buku', $data = [
            'buku' => $buku,
            'penerbit' => $penerbit,
            'kategori' => $kategori
        ]);
    }

    public function storeBuku(Request $request)
    {
        $request->validate([
            'kode_buku' => 'required',
            'judul' => 'required',
            'kode_penerbit' => 'required',
            'kode_kategori' => 'required',
            'penulis' => 'required'
        ]);

        Buku::create([
            'kode_buku' => $request->input('kode_buku'),
            'judul' => $request->input('judul'),
            'kode_penerbit' => $request->input('kode_penerbit'),
            'kode_kategori' => $request->input('kode_kategori'),
            'status' => 'tersedia',
            'penulis' => $request->input('penulis')
        ]);

        return redirect()->route('operator.buku');
    }

    public function updateBuku(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'kode_penerbit' => 'required',
            'kode_kategori' => 'required',
            'penulis' => 'required'
        ]);

        Buku::where('kode_buku', $request->input('kode_buku'))
            ->update([
                'judul' => $request->input('judul'),
                'kode_penerbit' => $request->input('kode_penerbit'),
                'kode_kategori' => $request->input('kode_kategori'),
                'penulis' => $request->input('penulis')
            ]);

        return redirect()->route('operator.buku');
    }

    public function putBuku(Buku $buku)
    {
        $penerbit = Penerbit::all();
        $kategori = Kategori::all();

        return view('operator.editbuku', $data = [
            'buku' => $buku,
            'penerbit' => $penerbit,
            'kategori' => $kategori
        ]);
    }

    public function transaksi()
    {
        $transaksi = Transaksi::
        join('anggota', 'transaksi.id_anggota', '=', 'anggota.kode_anggota')
        ->join('buku', 'transaksi.kode_buku', '=', 'buku.kode_buku')
        ->select('kode_transaksi', 'anggota.nama_anggota', 'buku.judul', 'tgl_pinjam', 'tgl_hrs_kembali', 'tgl_kembali')
        ->get();

        $anggota = Anggota::all();
        $buku = Buku::all();

        return view('operator/transaksi', $data = [
            'transaksi' => $transaksi,
            'anggota' => $anggota,
            'buku' => $buku
        ]);
        
    }

    public function storeTransaksi(Request $request)
    {
        $request->validate([
            'kode_transaksi' => 'required',
            'id_anggota' => 'required',
            'kode_buku' => 'required',
            'tgl_hrs_kembali' => 'required'
        ]);

        Transaksi::create($request->all());
        return redirect()->route('operator.transaksi');
    }

    public function putTransaksi(Transaksi $transaksi)
    {
        $anggota = Anggota::all();
        $buku = Buku::all();

        return view('operator/edittransaksi', $data = [
            'transaksi' => $transaksi,
            'anggota' => $anggota,
            'buku' => $buku
        ]);
    }

    public function updateTransaksi(Transaksi $transaksi, Request $request)
    {
        $request->validate([
            'tgl_hrs_kembali' => 'required'
        ]);

        Transaksi::where('kode_transaksi', $request->input('kode_transaksi'))
            ->update([
                'tgl_hrs_kembali' => $request->input('tgl_hrs_kembali'),
                'tgl_kembali' => $request->input('tgl_kembali')
            ]);

        return redirect()->route('operator.transaksi');
    }
}
