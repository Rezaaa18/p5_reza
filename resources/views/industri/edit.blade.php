@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Dashboard') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('industri.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('industri.update', $industri->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('put')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Industri</label>
                            <input type="text" class="form-control @error('nama_industri') is-invalid @enderror" name="nama_industri"
                                value="{{ $industri->nama_industri }}" placeholder="Nama Industri" required>
                            @error('nama_industri')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                value="{{ $industri->alamat }}" placeholder="Alamat" required>
                            @error('alamat')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tahun Kerja Sama</label>
                            <input type="date" class="form-control @error('tahun_kerjasama') is-invalid @enderror" name="tahun_kerjasama"
                                value="{{ $industri->tahun_kerjasama }}" placeholder="Tahun Kerja Sama" required>
                            @error('tahun_kerjasama')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="id_jurusan">Id Jurusan</label>
                            <select name="id_jurusan" class="form-control"required>
                                @foreach ($jurusan as $j)
                                <option value="{{ $j -> id}}">{{$j ->nama_jurusan}}</option>
                                @endforeach
                            </select>
                            @error('id_jurusan')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">SIMPAN</button>
                        <button type="reset" class="btn btn-sm btn-warning">RESET</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection