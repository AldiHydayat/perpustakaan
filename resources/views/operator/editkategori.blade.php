@extends('layout/app')

@section('title', 'Edit Anggota')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <form action="{{ route('operator.updkategori', ['kategori' => $kategori->kode_kategori]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Kategori</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="kode" value="{{ $kategori->kode_kategori }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="{{ $kategori->nama_kategori }}">
                    </div>
                    <button class="btn btn-success ">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection