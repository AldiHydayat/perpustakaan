@extends('layout/app')

@section('title', 'Edit Anggota')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <form action="{{ route('operator.updpenerbit', ['penerbit' => $penerbit->kode_penerbit]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Penerbit</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="kode" value="{{ $penerbit->kode_penerbit }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $penerbit->nama_penerbit }}">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $penerbit->almt_penerbit }}">
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Kontak</label>
                        <input type="text" class="form-control" id="telp" name="kontak" value="{{ $penerbit->kontak }}">
                    </div>
                    <button class="btn btn-success ">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection