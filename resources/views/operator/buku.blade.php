@extends('layout/app')

@section('title', 'Operator Perpus')

@section('content')
<div class="container">
    <div class="row mt-3">
        <h3 class="text-center">Data Buku</h3>
    </div>
    <div class="row">
        <form class="row g-3">
            <div class="col-auto">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Keyword</span>
                    <input type="text" class="form-control" name="keyword">
                </div>
            </div>
            <div class="col-auto">
                <button class="btn btn-success btn-sm" type="submit">Cari</button>
            </div>
        </form>
        <button type="button" class="btn btn-primary col-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Data
        </button>
    </div>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Kode Buku</th> 
                    <th scope="col">Judul</th> 
                    <th scope="col">Penerbit</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Status</th>
                    <th scope="col">Penulis</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $member)
                    <tr>
                        <td>{{ $member->kode_buku }}</td>
                        <td>{{ $member->judul }}</td>
                        <td>{{ $member->nama_penerbit }}</td>
                        <td>{{ $member->nama_kategori }}</td>
                        <td>{{ $member->status }}</td>
                        <td>{{ $member->penulis }}</td>
                        <td><a href="{{ route('operator.putbuku', ['buku' => $member->kode_buku]) }}" class="btn btn-warning btn-sm">Edit</a></td>
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
                <form action="{{ route('operator.strbuku') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Kode Buku</label>
                        <input type="text" class="form-control" name="kode_buku">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Judul</label>
                        <input type="text" class="form-control" name="judul">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penerbit</label>
                        <select name="kode_penerbit" class="form-control">
                            <option value="">Select Penerbit</option>
                            @foreach ($penerbit as $item)
                                <option value="{{ $item->kode_penerbit }}">{{ $item->nama_penerbit }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Kategori</label>
                        <select name="kode_kategori" class="form-control">
                            <option value="">Select Kategori</option>
                            @foreach ($kategori as $item)
                                <option value="{{ $item->kode_kategori }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Penulis</label>
                        <input type="text" class="form-control" name="penulis">
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