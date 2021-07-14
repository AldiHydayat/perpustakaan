@extends('layout/app')

@section('title', 'Operator Perpus')

@section('content')
<div class="container">
    <div class="row mt-3">
        <h3 class="text-center">Data Transaksi</h3>
    </div>
    <div class="row">
        <button type="button" class="btn btn-primary col-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data
        </button>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Kode Transaksi</th> 
                    <th scope="col">Anggota</th> 
                    <th scope="col">Buku</th>
                    <th scope="col">Pinjam</th>
                    <th scope="col">Harus Kembali</th>
                    <th scope="col">Kembali</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi as $member)
                    <tr>
                        <td>{{ $member->kode_transaksi }}</td>
                        <td>{{ $member->nama_anggota }}</td>
                        <td>{{ $member->judul }}</td>
                        <td>{{ $member->tgl_pinjam }}</td>
                        <td>{{ $member->tgl_hrs_kembali }}</td>
                        <td>{{ $member->tgl_kembali }}</td>
                        <td><a href="{{ route('operator.puttransaksi', ['transaksi' => $member->kode_transaksi]) }}" class="btn btn-warning btn-sm">Edit</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('operator.strtransaksi') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Transaksi</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="kode_transaksi">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Anggota</label>
                        <select name="id_anggota" id="nama" class="form-control">
                            <option value="">Select Anggota</option>
                            @foreach ($anggota as $member)
                                <option value="{{ $member->kode_anggota }}">{{ $member->nama_anggota }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Buku</label>
                        <select name="kode_buku" id="nama" class="form-control">
                            <option value="">Select Buku</option>
                            @foreach ($buku as $member)
                                <option value="{{ $member->kode_buku }}">{{ $member->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Tanggal Harus Kembali</label>
                        <input type="date" class="form-control" id="nama" name="tgl_hrs_kembali">
                    </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button></form>
            </div>
        </div>
        </div>
    </div>
@endsection