@extends('layout/app')

@section('title', 'Operator Perpus')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <h3 class="text-center">Data Penerbit</h3>
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
                        <th scope="col">Kode Kategori</th> 
                        <th scope="col">Nama</th> 
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $member)
                        <tr>
                            <td>{{ $member->kode_kategori }}</td>
                            <td>{{ $member->nama_kategori }}</td>
                            <td><a href="{{ route('operator.putkategori', ['kategori' => $member->kode_kategori]) }}" class="btn btn-warning btn-sm">Edit</a></td>
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
                <form action="{{ route('operator.strkategori') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Kategori</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="kode">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
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