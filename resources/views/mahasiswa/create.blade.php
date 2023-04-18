@extends('template')

@section('content')
@section('title', 'create')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-head">
                    <h1 class="text-center">Data Mahasiswa</h1>
                </div>
                <div class="card-body">
                    <form action="{{ route('mahasiswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="nim" class="form-label">Nim</label>
                            <input type="text" class="form-control" name="nim">
                        </div>
                        <div class="mb-3">
                            <label for="kelas" class="form-label">Kelas</label>
                            <input type="text" class="form-control" name="kelas">
                        </div>
                        <div class="mb-3">
                            <label for="gambar" class="form-label">Gambar</label>
                            <input type="file" class="form-control" name="gambar">
                        </div>
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary me-3">Kirim</button>
                            <a href="{{route('mahasiswa.index')}}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
