@extends('layout/app')

@section('title', 'Operator Perpus')

@section('content')
    <div class="container">
        <div class="row mt-3">
            <h3 class="text-center">Data Anggota</h3>
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
                        <th scope="col">Kode Anggota</th> 
                        <th scope="col">Nama</th> 
                        <th scope="col">Email</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Option</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($anggota as $member)
                        <tr>
                            <td>{{ $member->kode_anggota }}</td>
                            <td>{{ $member->nama_anggota }}</td>
                            <td>{{ $member->email_anggota }}</td>
                            <td>{{ $member->almt_anggota }}</td>
                            <td>{{ $member->tlp_anggota }}</td>
                            <td><a href="{{ route('operator.putanggota', ['anggota' => $member->kode_anggota]) }}" class="btn btn-sm btn-warning">Edit</a></td>
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
                <form action="{{ route('operator.stranggota') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Kode Anggota</label>
                        <input type="text" class="form-control" id="exampleFormControlInput1" name="kode">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="telp" class="form-label">Telepon</label>
                        <input type="text" class="form-control" id="telp" name="telp">
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