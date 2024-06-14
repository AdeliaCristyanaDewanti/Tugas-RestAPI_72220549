@extends('layouts.main')
@section('id', 'Produk')
@section('kategori')
    <div class="card">
        <div class="card-header">
            <a href="/kelontong_549/add-form" class="btn btn-primary"><i class="bi bi-plus-square"></i> Warung Kelontong 549</a>
        </div>
        <div class="card-body">
            @if(session('alert'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('alert') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            {{-- tabel disini --}}
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Kategori</th>
                        <th>Nama Produk</th>
                        <th>Nama Pelanggan</th>
                        <th>Foto Pesanan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kl as $idx => $k)
                        <tr>
                            <td>{{ $idx + 1 }}</td>
                            <td>{{ $k->kategori }}</td>
                            <td>{{ $k->produk }}</td>
                            <td>{{ $k->pelanggan }}</td>
                            <td>
                                <img src="{{ asset('/storage/' . $k->pesanan) }}" alt="{{ $k->pesanan }}" height="80" width="80">
                            </td>
                            <td>
                                <a href="/kelontong_549/edit-form/{{ $k->id }}" class="btn btn-success"><i class="bi bi-pencil-square"></i></a>
                                <a href="/delete/{{ $k->id }}" class="btn btn-danger"><i class="bi bi-trash3"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection