@extends('layout/app')

@section('title', 'Edit Anggota')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <form action="{{ route('operator.updanggota', ['anggota' => $anggota->kode_anggota]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Anggota</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="kode" value="{{ $anggota->kode_anggota }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $anggota->nama_anggota }}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="{{ $anggota->email_anggota }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $anggota->almt_anggota }}">
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telp" name="telp" value="{{ $anggota->tlp_anggota }}">
                    </div>
                    <button class="btn btn-success btn-sm">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection