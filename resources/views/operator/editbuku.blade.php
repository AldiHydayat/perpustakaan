@extends('layout/app')

@section('title', 'Edit Anggota')

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-4">
                <form action="{{ route('operator.updbuku', ['buku' => $buku->kode_buku]) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kode Buku</label>
                        <input type="text" class="form-control" name="kode_buku" value="{{ $buku->kode_buku }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul" value="{{ $buku->judul }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penerbit</label>
                        <select name="kode_penerbit" class="form-control">
                            <option value="">Select Penerbit</option>
                            @foreach ($penerbit as $item)
                                @if ($item->kode_penerbit == $buku->kode_penerbit)
                                    <option value="{{ $item->kode_penerbit }}" selected>{{ $item->nama_penerbit }}</option>
                                @endif
                                <option value="{{ $item->kode_penerbit }}">{{ $item->nama_penerbit }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kode_kategori" class="form-control">
                            <option value="">Select Kategori</option>
                            @foreach ($kategori as $item)
                                @if ($item->kode_kategori == $buku->kode_kategori)
                                    <option value="{{ $item->kode_kategori }}" selected>{{ $item->nama_kategori }}</option>
                                @endif
                                <option value="{{ $item->kode_kategori }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" class="form-control" name="penulis" value="{{ $buku->penulis }}">
                    </div>
                    <button class="btn btn-success ">Simpan</button>
                </form>
            </div>
        </div>
    </div>
@endsection