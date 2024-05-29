@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Ekskul') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('ekskul.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <img src="{{ asset('storage/ekskuls/' . $ekskul->image) }}" class="w-100 rounded">
                    <hr>
                    <h4>{{ $ekskul->judul }}</h4>
                    <p class="tmt-3">
                         {{ ($ekskul->deskripsi) }}
                    </p>
                    <p class="tmt-3">
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection