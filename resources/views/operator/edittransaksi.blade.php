@extends('layout/app')

@section('title', 'Edit Anggota')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <form action="{{ route('operator.updtransaksi', ['transaksi' => $transaksi->kode_transaksi ]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Transaksi</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="kode_transaksi" value="{{ $transaksi->kode_transaksi }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Anggota</label>
                        <input type="text" name="kode_anggota" class="form-control" readonly 
                            @foreach ($anggota as $member)
                                @if ($member->kode_anggota == $transaksi->id_anggota)
                                    value="{{ $member->nama_anggota }}"
                                @endif
                            @endforeach
                        >
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Buku</label>
                        <input type="text" name="kode_buku" class="form-control" readonly
                            @foreach ($buku as $member)
                                @if ($member->kode_buku == $transaksi->kode_buku)
                                    value="{{ $member->judul }}"
                                @endif
                            @endforeach
                        >
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Tanggal Harus Kembali</label>
                        <input type="date" class="form-control" id="nama" name="tgl_hrs_kembali" value="{{ $transaksi->tgl_hrs_kembali }}">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Tanggal Kembali</label>
                        <input type="date" class="form-control" id="nama" name="tgl_kembali">
                    </div>
                    <button class="btn btn-success" type="submit">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection