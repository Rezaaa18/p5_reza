@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Ekskul') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('ekskul.create') }}" class="btn btn-sm btn-outline-primary">Tambah Data</a>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Ekstrakulikuler</th>
                                    <th>Deskripsi</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no = 1; @endphp
                                @forelse ($ekskul as $data)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $data->ekskul }}</td>
                                    <td>{!! $data->deskripsi !!}</td>
                                    <td>
                                        <img src="{{ asset('/storage/ekskuls/' . $data->image) }}" class="rounded"
                                            style="width: 150px">
                                    </td>
                                    <td>
                                        <form action="{{ route('ekskul.destroy', $data->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('ekskul.show', $data->id) }}"
                                                class="btn btn-sm btn-outline-dark">Show</a> |
                                            <a href="{{ route('ekskul.edit', $data->id) }}"
                                                class="btn btn-sm btn-outline-success">Edit</a> |
                                            <button type="submit" onsubmit="return confirm('Are You Sure ?');"
                                                class="btn btn-sm btn-outline-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center">
                                        Data data belum Tersedia.
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $ekskul->withQueryString()->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection