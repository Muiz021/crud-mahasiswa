@extends('template')

@section('content')
@section('title', 'show')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card px-3">
                <div class="row">
                    <div class="card-head">
                        <h1 class="text-center">Data Mahasiswa</h1>
                    </div>
                    <div class="card-body d-flex align-items-center">
                        <div class="col-6 me-3">
                            <div class="d-flex justify-content-center">
                                <img src="{{ asset('images/' . $mahasiswa->gambar) }}" width="100%" alt="">
                            </div>
                        </div>
                        <div class="col-6">
                            <table>
                                <tr>
                                    <td><b>Nama</b></td>
                                    <td>: </td>
                                    <td>{{ $mahasiswa->nama }}</td>
                                </tr>
                                <tr>
                                    <td><b>Nim</b></td>
                                    <td>: </td>
                                    <td>{{ $mahasiswa->nim }}</td>
                                </tr>
                                <tr>
                                    <td><b>Kelas</b></td>
                                    <td>: </td>
                                    <td>{{ $mahasiswa->kelas }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end mb-3">
                        <a name="" id="" class="btn btn-secondary"
                            href="{{ route('mahasiswa.index') }}" role="button">kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
